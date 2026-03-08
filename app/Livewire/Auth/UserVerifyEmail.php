<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Notifications\Auth\VerifyEmail;


class UserVerifyEmail extends Component
{

    public function mount()
    {
        if (Auth::user()->hasVerifiedEmail()) {
            return $this->redirect(route('userPreparingDashboard', absolute: false), navigate: false);
        }
    }

    // the function here ensure that message is sent to the user email when call
    public function sendVerification()
    {
        $user = Auth::user();

        if ($user->hasVerifiedEmail()) { // redirect user to their dashboard if the email has been verify
            return $this->redirect(route('userPreparingDashboard', absolute: false), navigate: false);
        }

        $user->notify(new VerifyEmail);   // this triggers the email message to be sent to the user

        Session::flash('message', "A new verification link has been sent to your email address. If you didn't receive the email, we will gladly send you another.");
        return $this->redirect(route('userVerifyEmail', absolute: false), navigate: false);
    }


    public function render()
    {
        return view('livewire.auth.user-verify-email')->layout("layouts.auth.app");
    }
}
