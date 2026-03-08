<?php

namespace App\Livewire\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;

class UserLogin extends Component
{

    public $account_number;
    public $password;


    public function loginform(){

        // handles validation
        $this->validate([
            'account_number' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', Rules\Password::defaults()],
        ]);

        
     
        if (Auth::attempt(['account_number' => $this->account_number, 'password' => $this->password])) {
            session()->regenerate();


            // if user email is not verified redirect to verify email page
            if (! Auth::user()->hasVerifiedEmail()) {
               return  $this->redirect(route('userVerifyEmail', absolute: false), navigate: false);
            }
            
            // redirect to user preparing dashboard
            return $this->redirect(route('userPreparingDashboard', absolute: false), navigate: false);
        } else {
            $this->addError('account_number', 'The provided credentials are incorrect.');
        }


        




    }


    public function render()
    {
        return view('livewire.auth.user-login');
    }
}
