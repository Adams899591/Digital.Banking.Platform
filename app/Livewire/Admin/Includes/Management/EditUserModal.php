<?php

namespace App\Livewire\Admin\Includes\Management;

use App\Models\User;
use Livewire\Component;

class EditUserModal extends Component
{
    protected $listeners = ["openEditUserModal"]; // This will listen for the "openEditUserModal".
    public $user; // This will hold the user data to be displayed in the modal

    public $name, $email, $status, $password;  // this hold all the property on the Edit user modal

    /* this method sets the user property to a new instance of the User model when the component is mounted. 
    This ensures that the user property is always defined and can be used in the view without causing errors,*/ 
    public function mount()
    {
        $this->user = new User();
    }
    

    /* This method will be called when the "Edit" button is clicked in the UsersTable component. It will receive the user ID as a parameter, 
    find the corresponding user in the database, and set it to the user property. This allows the modal to display the user's information.*/
    public function  openEditUserModal($userId){

        $this->user   = User::findOrFail($userId);

         $this->name  = $this->user->first_name ." " . $this->user->last_name;
         $this->email =   $this->user->email;
         $this->status =  $this->user->status;
        
    }


    /* This method will be called when the "Save Changes" 
    button is clicked in the edit user modal. */
    public function updateUser(){

       $this->validate([
        "name" => "required|string|max:255",
        "email" => "required|email|unique:users,email," . $this->user->id, // Ensure email is unique except for the current user
        "status" => "required|in:Active,Suspended,Pending",
        "password" => "nullable|string|min:6|confirmed", // Password is optional, but if provided, it must be at least 6 characters and match the confirmation field
       ]);

         // Update user information
        $this->user->first_name = explode(" ", $this->name)[0]; // Assuming the first part of the name is the first name
        $this->user->last_name = implode(" ", array_slice(explode(" ", $this->name), 1)); // Assuming the rest of the name is the last name
        $this->user->email = $this->email;
        $this->user->status = $this->status;
        if ($this->password) { // update password if it is not empty
            $this->user->password = bcrypt($this->password);
        }
        $this->user->save(); // save it to user model

        $this->dispatch('user-updated');
        
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
        return view('livewire.admin.includes.management.edit-user-modal', ["user" =>  $this->user]);
    }
}
 