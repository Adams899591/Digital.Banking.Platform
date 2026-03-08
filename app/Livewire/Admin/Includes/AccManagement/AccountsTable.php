<?php

namespace App\Livewire\Admin\Includes\AccManagement;

// use App\Helpers\Services\admin\AccManagementHelper;
use App\Helpers\Services\admin\AccManagementHelper;
use App\Models\BankAccount;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class AccountsTable extends Component
{
    use WithPagination;
    public $account_id;  // This will hold the ID of the user being viewed or edited
    public $search, $date, $value; // this section hold the values from filter section
   

    /* This method will be called when the "View" button is clicked in the account table.*/
    public function viewAccount($account_id){
       $this->account_id = $account_id;
       $this->dispatch('openViewAccountModal', accountId:   $this->account_id); // dispatches an event named "openAccountUserModal" with the user ID as a parameter. 
    }

    /* This method will be called when the "View" button is clicked in the account table.*/
    public function editAccount($account_id){
       $this->account_id = $account_id;
       $this->dispatch('openEditAccountModal', accountId:   $this->account_id); // dispatches an event named "openAccountUserModal" with the user ID as a parameter. 
    }


    // this method will be called when the "Delete" button is clicked in the users table.
    public function confirmDelete($account_id){
        $this->account_id = $account_id;
    }

    // This method will be called to delete the account after confirmation.
    public function deleteAccount(){
        $account = BankAccount::findOrFail($this->account_id);   
        $account->delete();
        $this->dispatch('account-deleted');
    }


    // This method will run when the user sellect a value 
    public function fetchUserByStatuses($value){
        $this->value = $value; // this get the value sellected and make it globaly accessable 
    }

    // This method will run when the user sellect a date
    public function fetchUserByDate($date){
        $this->date = $date; // this get the date sellected and make it globaly accessable 
    }

    


    public function render(AccManagementHelper $accManagementHelper)
    {
          $accounts = $accManagementHelper->handlesFilteredAccounts($this->value ,$this->search ,$this->date);

        return view('livewire.admin.includes.acc-management.accounts-table',["accounts" => $accounts]);
    }

    //  public function render(){

    //     if ($this->value) {
    //         $accounts = BankAccount::where("status", "=", $this->value )->with("user")->latest()->paginate(3); // fetch all accounts with their associated user data, ordered by latest created
    //     }elseif($this->search){  // fetch account based on the input search

    //         $accounts = BankAccount::where(function($q) {
    //                     $q->where('status', 'like', '%' . $this->search . '%')
    //                     ->orWhere('account_type', 'like', '%' . $this->search . '%')
    //                     ->orWhere('premier_balance', 'like', '%' . $this->search . '%');
    //                 })->with("user")->latest()->paginate(3);

    //     }elseif ($this->date) {
    //         $accounts = BankAccount::whereDate("created_at", ">", $this->date)->with("user")->latest()->paginate(3); // fetch all accounts with their associated user data, ordered by latest created
    //     } else{
    //         $accounts = BankAccount::with("user")->latest()->paginate(3); // fetch all account with their associated user data, ordered by latest created
    //     }

    //     return view('livewire.admin.includes.acc-management.accounts-table',["accounts" => $accounts]);
    // }
}
