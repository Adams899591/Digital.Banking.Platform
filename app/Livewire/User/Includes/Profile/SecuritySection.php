<?php

namespace App\Livewire\User\Includes\Profile;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class SecuritySection extends Component
{
    public $current_password;
    public $password;
    public $password_confirmation;

    // this update the password of the user
    public function updatePassword(){
        // validate the input
        $this->validate([
            // custom validation rule to check if the current password is correct
            "current_password" => ["required", function($att, $value, $fail){
                if (!Auth::guard('web')->validate(['email' => Auth::user()->email, 'password' => $value])) {
                    $fail('The current password is incorrect.');
                }
            }],
            "password" => ["required", "confirmed", "min:8"],
            "password_confirmation" => "required",
        ]);
        
        // update the password
        $user = Auth::user();

        $this->authorize("userUpdate", $user); // Ensure the user is updating their own record
        
        $user->password = bcrypt($this->password);
        $user->save();

        $this->reset();
        return redirect()->back()->with("success", "password updated successfully!");

    }

    public function render()
    {
        return view('livewire.user.includes.profile.security-section');
    }
}
