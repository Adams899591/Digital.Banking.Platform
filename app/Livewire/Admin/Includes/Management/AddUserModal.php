<?php

namespace App\Livewire\Admin\Includes\Management;

use App\Events\NewUserAccountCreatedEvent;
use App\Models\Bank;
use App\Models\User;
use Livewire\Component;

class AddUserModal extends Component
{

   public $name, $email, $status, $password, $password_confirmation, $bank_id, $username ,$account_number, $profile_picture;  // this hold all the property on the Add user modal

     /* This method will be called when the "Create User" button is clicked in the add user modal. */
    public function createUser(){
       
       //  handles user validation
        $this->validate([
            "name" => "required|string|max:255",
            "email" => "required|email|unique:users,email",
            "status" => "required|in:Active,Suspended,Pending",
            "password" => "required|string|min:6|confirmed", // Password is required, must be at least 6 characters and match the confirmation field
            "password_confirmation" => "required",
            "bank_id" =>  "required",
        ]);

            // function to generate a unique account number 
            function generateUniqueAccountNumber() {
                do {
                    $accountNumber = mt_rand(100000000000, 999999999999); // Generate a random 10-digit number
                } while (User::where('account_number', $accountNumber)->exists()); // Check if it already exists in the database
                return $accountNumber;
            }


           // Create new user
           $user =new User();
            $name1 = explode(" ", $this->name)[0]; // Assuming the first part of the name is the first name
            $name2 = implode(" ", array_slice(explode(" ", $this->name), 1)); // Assuming the rest of the name is the last name
           
           $user->first_name = $name1;
           $user->last_name = $name2;
           $user->username = strtolower(str_replace(' ', '', $this->name));
           $user->email = $this->email;
           $user->status = $this->status;
           $user->password = bcrypt($this->password);
           $user->bank_id = $this->bank_id;
           $user->account_number = generateUniqueAccountNumber(); // Generate and assign a unique account number
           $user->profile_picture = "https://ui-avatars.com/api/?name={$name1}+{$name2}&background=0a5b5e&color=fff";
           $user->save(); // save it to user model

           // this trigger an event that handles the sending of email notification to user
           event(new NewUserAccountCreatedEvent($user));
           
           // Reset form fields after successful creation
           $this->name = '';
           $this->email = '';
           $this->status = '';
           $this->password = '';
           $this->status = "";
           $this->account_number = "";
           $this->password_confirmation = "";

           // Dispatch an event to notify that a new user has been created (optional)
           $this->dispatch('user-created');
    }

    public function render()
    {
        $banks = Bank::limit(10)->inRandomOrder()->get(); // Fetch all banks to populate the bank selection dropdown in the modal
        return view('livewire.admin.includes.management.add-user-modal', ["banks" => $banks]);
    }
}
