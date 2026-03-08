<?php

namespace App\Livewire\Auth;

use Livewire\Component;

class UserPreparingDashboard extends Component
{
    public function render()
    {
        return view('livewire.auth.user-preparing-dashboard')->layout("layouts.auth.app2");
    }
}
