<?php

namespace App\Livewire\User\Includes\Profile;

use App\Models\User;
use Livewire\Component;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class PersonalInformation extends Component
{
    public $name;
    public $email;
    public $address;
    public $phone;

    // this fill all the value in the input filed's
    public function mount(){
       $this->name = Auth::user()->first_name ." ". Auth::user()->last_name ;
       $this->email = Auth::user()->email ;
       $this->address = Auth::user()->address;
       $this->phone = Auth::user()->phone; 
    }


    // update Profile Information 
    public function updateProfileInformation(){

         $this->validate([ // handles validation
            "name" => ["required", "string"],
            "email" => ["required", Rule::unique("users", "email")->ignore(Auth::id())],
            "address" => ["required", "string"],
            "phone" => ["required", "numeric", "digits_between:1,11", Rule::unique("users", "email")->ignore(Auth::id())],
         ]);

        
        $user = User::findOrFail(Auth::id()); // find the user with the Authenticated id from the database

        $this->authorize("userUpdate", $user); // Ensure the user is updating their own record

        $name = explode(" ", $this->name, 2); // get the request and split it into first name and lastname

        $user->first_name = $name[0];
        $user->last_name = $name[1];
        $user->email = $this->email;
        $user->phone = $this->phone;
        $user->address = $this->address;
        $user->save();  // save data back to database

        return redirect()->back()->with("success", "profile information updated successfully!");

    }


    public function render()
    {
        return view('livewire.user.includes.profile.personal-information');
    }
}
