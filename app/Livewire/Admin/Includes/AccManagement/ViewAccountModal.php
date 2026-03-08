<?php

namespace App\Livewire\Admin\Includes\AccManagement;

use App\Models\BankAccount;
use App\Models\User;
use Livewire\Component;

class ViewAccountModal extends Component
{
     
    protected $listeners = ["openViewAccountModal"]; // This will listen for the "openViewAccountModal".
    public $account; // This will hold the account data to be displayed in the modal

    /* this method sets the account property to a new instance of the Account model when the component is mounted. 
    This ensures that the account property is always defined and can be used in the view without causing errors,*/ 
    public function mount()
    {
        $this->account = new BankAccount();
    }

      /* This method will be called when the "View" button is clicked in the AccountsTable component. It will receive the account ID as a parameter, 
    find the corresponding account in the database, and set it to the account property. This allows the modal to display the account's information.*/
    public function  openViewAccountModal($accountId){
        $this->account = BankAccount::with("user")->findOrFail($accountId);
        // dd($this->account);
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
        return view('livewire.admin.includes.acc-management.view-account-modal', ["account" => $this->account]);
    }
}
