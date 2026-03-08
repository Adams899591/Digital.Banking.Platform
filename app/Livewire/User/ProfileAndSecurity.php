<?php

namespace App\Livewire\User;

use Livewire\Component;

class ProfileAndSecurity extends Component
{
    public function render()
    {
        return view('livewire.user.profile-and-security')->layout("layouts.user.app");
    }
}
