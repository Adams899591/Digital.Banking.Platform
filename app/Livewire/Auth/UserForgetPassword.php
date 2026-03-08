<?php

namespace App\Livewire\Auth;

use Livewire\Component;

class UserForgetPassword extends Component
{
    public function render()
    {
        return view('livewire.auth.user-forget-password')->layout("layouts.auth.app");
    }
}
