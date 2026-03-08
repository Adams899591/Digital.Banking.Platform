<?php

namespace App\Livewire\Admin\Includes\Management;

use App\Models\User;
use Livewire\Component;
 
class ViewUserModal extends Component
{
    protected $listeners = ["openViewUserModal"]; // This will listen for the "openViewUserModal".
    public $user; // This will hold the user data to be displayed in the modal

    /* this method sets the user property to a new instance of the User model when the component is mounted. 
    This ensures that the user property is always defined and can be used in the view without causing errors,*/ 
    public function mount()
    {
        $this->user = new User();
    }
    

    /* This method will be called when the "View" button is clicked in the UsersTable component. It will receive the user ID as a parameter, 
    find the corresponding user in the database, and set it to the user property. This allows the modal to display the user's information.*/
    public function  openViewUserModal($userId){

       $this->user   = User::with("bank")->findOrFail($userId);
        
    }

    /** Reset the user property to a fresh instance.
     * This will be called when the modal is closed so that the
     * previous user data doesn't linger in the component. */
    public function resetUser()
    {
        $this->user = new User();
    }


    public function render()
    {
        return view('livewire.admin.includes.management.view-user-modal', ["user" =>  $this->user]);
      
    }

}

      
