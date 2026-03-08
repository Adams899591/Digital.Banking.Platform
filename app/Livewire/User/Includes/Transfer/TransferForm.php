<?php

namespace App\Livewire\User\Includes\Transfer;

use App\Models\Bank;
use App\Models\User;
use Livewire\Component;
use App\Models\BankAccount;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Events\UserNotificationBellEvent;

class TransferForm extends Component
{

   public $accountNumber; // this holds the account number input by the user
   public $recipientName; // this will hold the fetched recipient name
   public $recipientName_id; // this store the fetched recipient id for transfer
   public $bank; // this holds the selected bank
   public $amount;
   public $description;

   // this hold the login user account transfer pin 
   public $pin1, $pin2, $pin3, $pin4;

 
   // Method to fetch recipient name based on account number
   public function fetchAccountName($accountNumber, $bank = null){

       $user = User::where("account_number", $accountNumber)->when($bank ?? $this->bank, function($q, $v) { $q->where('bank_id', Bank::where('name', data_get($v, 'name', $v))->value('id')); })->first(); // Fetch the user with the given account number
      
       if ($user) { // If the user exists

          $this->recipientName = $user ? $user->first_name . ' ' . $user->last_name : ''; // Set the recipient name to the user's first and last name
          $this->recipientName_id = $user->id; // Set the recipient id
        
       }else{ // If no user is found

          $this->recipientName = "No account found!"; // Set a default message

       }
       
   }


   // Method to handle the transfer submission
   public function submitTransfer(){

        // sender
        $senderAccount = Auth::user()->bankAccount;

        // receiver
        $receiver =  User::with("bankAccount")->find($this->recipientName_id);
        $receiverAccount = $receiver->bankAccount;
        
        // get the amount to be transfer and ensure it's a positive number
        $amount = (float) $this->amount;

        // Validate sender has enough funds and the amount is valid
        if ($senderAccount->premier_balance < $amount || $amount <= 0) {
            // You can add an error message here for the user to see
            session()->flash('error', 'Invalid amount or insufficient funds.');
            return;
        }

        // Validate transfer PIN
        if ( ( (int)$this->pin1 . (int)$this->pin2 . (int)$this->pin3 . (int)$this->pin4 ) !== substr(Auth::user()->account_number, -4) ) {
            // return error message
            session()->flash('error', 'Invalid transfer PIN.');
            return;
        }

        // i Use decrement/increment for safe, atomic database updates.
        // These methods update the database directly.
        $senderAccount->decrement('premier_balance', $amount);
        $receiverAccount->increment('premier_balance', $amount);
        
        // update total amount debited by sender
        $senderAccount->increment('amount_debited', $amount); 


        // Create transaction records for sender
        Transaction::create([
            "sender_id" => Auth::id(),
            "receiver_id" => $receiver->id,
            "sender_bank_id" => Auth::user()->bank_id,
            "receiver_bank_id" => $receiver->bank_id,
            "amount" => $amount,
            "description" => $this->description ?? null,
            "transaction_type" => "Debit",
            "status" => "Completed",
            "reference_id" => Str::uuid(),
            "receipt_url" => "storage/receipts/",
            "sender_balance"=> $senderAccount->premier_balance,
            "receiver_balance"=> $receiverAccount->premier_balance
        ]);

        // Create transaction records for receiver
        Transaction::create([
            "sender_id" => Auth::id(),
            "receiver_id" => $receiver->id,
            "sender_bank_id" => Auth::user()->bank_id,
            "receiver_bank_id" => $receiver->bank_id,
            "amount" => $amount,
            "description" => $this->description ?? null,
            "transaction_type" => "Credit",
            "status" => "Completed",
            "reference_id" => Str::uuid(),
            "receipt_url" => "storage/receipts/",
            "sender_balance"=> $senderAccount->premier_balance,
            "receiver_balance"=> $receiverAccount->premier_balance
        ]);

        // Notify Sender (Debit)
        Auth::user()->notifications()->create([
            "title" => "Debit Alert",
            "message" => number_format($amount, 2) . " debited from your account.",
            "read_status" => false,
        ]); 
        
        // Notify Receiver (Credit)
        $receiver->notifications()->create([
            "title" => "Credit Alert",
            "message" => number_format($amount, 2) . " credited to your account.",
            "read_status" => false,
        ]);

        
        // call the pdf generation and save method
        app('App\Http\Controllers\pdf\TransactionReceiptController')->generateAndSaveTransactionReceipt();

        // Broadcast event AFTER saving the notification so the count is accurate when the frontend refreshes
        // event(new UserNotificationBellEvent("You have received a credit of " . number_format($amount, 2), $receiver->id));

        // show success modal
        $this->dispatch('transfer-success');


        
   }

   // Reset the form fields
   public function resetForm(){
        $this->reset(['accountNumber', 'recipientName', 'recipientName_id', 'amount', 'bank']);
   }

    public function render()
    {
        return view('livewire.user.includes.transfer.transfer-form',[ "banks" => Bank::all()]);
    }
}
