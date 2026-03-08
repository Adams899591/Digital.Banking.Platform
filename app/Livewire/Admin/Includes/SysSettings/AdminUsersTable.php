<?php

namespace App\Livewire\Admin\Includes\SysSettings;

use App\Models\Admin;
use Livewire\Component;
use Livewire\WithPagination;

class AdminUsersTable extends Component
{
    use WithPagination;

    public $name, $email, $password, $role, $status; // this proprtty handled edit model
    public $admin_name, $admin_email, $admin_password, $admin_role, $admin_status; // this proprtty handled add model

    public $admin_Id; // this hold the passed admin id and make it globally accessable
    public $admin_id_to_delete; // for delete confirmation

   
    // this method is responsible for creating a new admin in the database when the create button is clicked
    public function createAdmin(){
        // validate the input data
        $this->validate([
            "admin_name" => "required",
            "admin_email" => "required|email|unique:admins,email",
            "admin_password" => "required|min:6",
            "admin_role" => "required",
            "admin_status" => "required"
        ]);

        $parts = explode(" ", $this->admin_name); // split the full name into first name and last name

        Admin::create([ // create a new admin in the database
            "first_name" => $parts[0], // get the first name from the name input
            "last_name" => $parts[1] ?? "", // get the last name from the name input
            "email" => $this->admin_email,
            "password" => bcrypt($this->admin_password), // hash the password before saving to the database
            "role" => $this->admin_role,
            "status" => $this->admin_status,
            "username" => $this->admin_email, // use the email as the username
            "phone" => "N/A", 
            "bank_id" => "2",
            "profile_picture" => "https://images.unsplash.com/photo-1500648767791-00dcc994a43e", // set a default profile image (you can modify this as needed)
        ]);

        // Dispatch an event to notify that a new admin has been created (optional)
        $this->dispatch('admin-created');

        // Reset the form fields after successful creation
        $this->reset(['admin_name', 'admin_email', 'admin_password', 'admin_role', 'admin_status']);
    }
   

    // this method is responsible for filling the edit form with the admin details when the edit button is clicked
    public function editAdmin($admin_Id){

       $this->admin_Id = $admin_Id; // make the passed id public

       $admin =  Admin::findOrFail($this->admin_Id); // find the passed id 

       // fill the the model with the passed admin id
       $this->name = $admin->first_name ." " . $admin->last_name;
       $this->email = $admin->email;
       $this->role = $admin->role;
       $this->status = $admin->status;
    
    }


    // this method is responsible for updating the admin details in the database when the update button is clicked
    public function updateAdmin(){
          // validate the input data
          $this->validate([
            "name" => "required",
            "email" => "required|email",
            "role" => "required",
            "status" => "required",
            "password" => "nullable"
          ]);

            $admin = Admin::findOrFail($this->admin_Id); // find the admin with the passed id
          
            $parts = explode(" ", $this->name); 

            $admin->first_name = $parts[0]; // get the first name from the name input
            $admin->last_name = $parts[1] ?? ""; // get the last name from the name input
            $admin->email = $this->email;
            $admin->role = $this->role;
            $admin->status = $this->status;
                if($this->password){ // if the password input is not empty
                    $admin->password = bcrypt($this->password); // hash the password and save it to the database
                }
            $admin->save(); // save the updated admin data

           // Dispatch an event to notify that admin details  u has been updated (optional)
           $this->dispatch('admin-updated');
    }

    // this method is responsible for setting the admin id for deletion
    public function confirmDelete($admin_id) {
        $this->admin_id_to_delete = $admin_id;
    }

    // this method is responsible for deleting the admin
    public function deleteUser() {
        $admin = Admin::findOrFail($this->admin_id_to_delete);
        $admin->delete();
        $this->dispatch('user-deleted');
        $this->reset('admin_id_to_delete');
    }
    
    public function render()
    {
        $admins =  Admin::latest()->paginate(3); // fetch all the admin
        return view('livewire.admin.includes.sys-settings.admin-users-table',compact("admins"));
    }
}
