<?php

namespace App\Livewire\Auth;


use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
// use Illuminate\Support\Facades\Password;

class AdminLogin extends Component
{

    public $username;
    public $password;


    // this function sign in admin to dashboard 
    public function AdminSignIn(){
      
       // handles validation
       $this->validate([
        'username' => ['required', 'string'],
        'password' => ['required', 'string', Password::defaults()],
       ]);


      if (Auth::guard("admin")->attempt(['username' => $this->username, 'password' => $this->password])) {
        session()->regenerate();
        
        // redirect to user preparing dashboard
        return $this->redirect(route('adminPreparingDashboard', absolute: false), navigate: false);
   
    } else {
        $this->addError('username', 'The provided credentials are incorrect.');
    }

    }


    public function render()
    {
        return view('livewire.auth.admin-login')->layout("layouts.auth.app");
    }
}
