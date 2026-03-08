<?php

namespace App\Livewire\Auth;

use Livewire\Component;

class AdminForgetPassword extends Component
{
    public function render()
    {
        return view('livewire.auth.admin-forget-password')->layout("layouts.auth.app");
    }
}
