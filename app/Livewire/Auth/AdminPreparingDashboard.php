<?php

namespace App\Livewire\Auth;

use Livewire\Component;

class AdminPreparingDashboard extends Component
{
    public function render()
    {
        return view('livewire.auth.admin-preparing-dashboard')->layout("layouts.auth.app2");
    }
}
