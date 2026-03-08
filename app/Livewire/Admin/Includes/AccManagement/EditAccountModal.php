<?php

namespace App\Livewire\Admin\Includes\AccManagement;
 
use App\Models\BankAccount;
use Livewire\Component;

class EditAccountModal extends Component
{

    protected $listeners = ["openEditAccountModal"]; // This will listen for the "openEditAccountModal".
    public $account; // This will hold the account data to be displayed in the modal

    public $client_name, $account_type, $balance, $status;  // this hold all the property on the Edit account modal

    /* this method sets the account property to a new instance of the Account model when the component is mounted. 
    This ensures that the account property is always defined and can be used in the view without causing errors,*/ 
    public function mount()
    {
        $this->account = new BankAccount();
    }

      /* This method will be called when the "View" button is clicked in the AccountsTable component. It will receive the account ID as a parameter, 
    find the corresponding account in the database, and set it to the account property. This allows the modal to display the account's information.*/
    public function  openEditAccountModal($accountId){
        $this->account = BankAccount::with("user")->findOrFail($accountId);
        
        // fill in the edit account field with the user data 
        $this->client_name = $this->account->user->first_name . ' ' . $this->account->user->last_name;
        $this->account_type = $this->account->account_type;
        $this->balance = $this->account->premier_balance;
        $this->status = $this->account->status;
    }


    // this method will be called when the "Save Changes" button is clicked in the edit account modal.
    public function updateAccount(){
        $this->validate([
            "account_type" => "required|in:Savings,Checking,Investment",
            "status" => "required|in:Active,Suspended,Pending",
        ]);

        // Update account information
        $this->account->account_type = $this->account_type;
        $this->account->status = $this->status;
        $this->account->save(); // save it to account model

        $this->dispatch('account-updated'); // dispatch an event to notify the AccountsTable component that the account has been updated
    }


    /** Reset the user property to a fresh instance.
     * This will be called when the modal is closed so that the
     * previous user data doesn't linger in the component. */
    public function resetUser()
    {
        $this->account = new BankAccount();
    }

    public function render()
    {
        return view('livewire.admin.includes.acc-management.edit-account-modal', ["account" => $this->account]);
    }
}
