<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class AccountManagement extends Component
{
    public function render()
    {
        return view('livewire.admin.account-management')->layout("layouts.admin.app");
    }
}
