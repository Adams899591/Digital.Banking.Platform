<?php

namespace App\Livewire\Admin\Includes\Management;

use App\Models\User;
use Livewire\Component; 
use Livewire\WithPagination;

class UsersTable extends Component
{
    use WithPagination;
    public $user_id; // This will hold the ID of the user being viewed or edited
    public $search, $date, $value; // this section hold the values from filter section
    
    

    /* This method will be called when the "View" button is clicked in the users table.*/
    public function viewUser($user_id){
       $this->user_id = $user_id;
       $this->dispatch('openViewUserModal', userId:  $this->user_id); // dispatches an event named "openViewUserModal" with the user ID as a parameter. 
    }


    /* This method will be called when the "Edit" button is clicked in the users table.*/
    public function editUser($user_id){
         $this->user_id = $user_id;
         $this->dispatch('openEditUserModal', userId:  $this->user_id); // dispatches an event named "openEditUserModal" with the user ID as a parameter. 
    }

    // this method will be called when the "Delete" button is clicked in the users table.
    public function confirmDelete($user_id){
        $this->user_id = $user_id;
    }

    // This method will be called to delete the user after confirmation.
    public function deleteUser(){
        $user = User::findOrFail($this->user_id);
        $user->delete();
        $this->dispatch('user-deleted');
    }

    // This method will run when the user sellect a value 
    public function fetchUserByStatuses($value){
        $this->value = $value; // this get the value sellected and make it globaly accessable 
    }

    // This method will run when the user sellect a date
    public function fetchUserByDate($date){
        $this->date = $date; // this get the date sellected and make it globaly accessable 
    }


    public function render()
    {

       // this handles all action that has to do with displaying record on users table
        if ($this->value) {   // fetch user based on the value sellected          
                        $users = User::where("status", "=", $this->value)->latest()->paginate(3);

        }elseif($this->search){  // fetch user based on the input search

            $users = User::where(function($q) {
                        $q->where('first_name', 'like', '%' . $this->search . '%')
                        ->orWhere('last_name', 'like', '%' . $this->search . '%')
                        ->orWhere('email', 'like', '%' . $this->search . '%');
                    })->latest()->paginate(3);

        }elseif($this->date){  // fetch user based on the date sellected 
            $users = User::whereDate("created_at", "<", $this->date)->latest()->paginate(3);
        }else{
            $users = User::latest()->paginate(3); // This retrieves the latest users from the database and paginates them, showing 5 users per page.
        }
         
        return view('livewire.admin.includes.management.users-table', ["users" => $users]);
    }
}
   