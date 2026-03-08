<?php

namespace App\Livewire\User\Includes\Statement;

use Livewire\Component;
use App\Models\Transaction;
use Masmerise\Toaster\Toaster;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Helpers\Services\user\StatementHelper;


class TransactionHistory extends Component
{

  public $transactionId; // This property will hold the ID of the transaction for which the receipt is being downloaded
  public $limit = 2; // items per load
  


   // This method will be called when the user clicks the download button for a transaction receipt
   public function downloadTransactionReceipt($transactionId)
   {
            $this->transactionId = $transactionId;
            $transaction = Transaction::find($this->transactionId);
            $filename = $transactionId . '.pdf'; // Assuming the receipt is stored with the transaction ID as the filename
           
            // Check if the transaction exists and belongs to the authenticated user
            if (empty($transaction) || !Storage::disk('receipts')->exists($filename)) {
              Toaster::error("No receipt found for this transaction!");
              return;
            }
 
            // Download the receipt
           return Storage::disk('receipts')->download($filename);
          
   }

   
   // This method will be called when the user clicks the load more button
   public function loadMore(){
       $this->limit += 2; // load 2 more each click
   }



    public function render(StatementHelper $statementHelper)
    {
        // old
        $transactions =   $statementHelper->haldlesTransactionsSentAndReceiveByAuth_User($this->limit);
        
    
        return view('livewire.user.includes.statement.transaction-history',['transactions' => $transactions ]);
    }

}
