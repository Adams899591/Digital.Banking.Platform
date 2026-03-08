<?php

namespace App\Livewire\Admin;

use App\Models\Admin;
use Livewire\Component;

class SystemSettings extends Component
{
    public function render()
    {
        return view('livewire.admin.system-settings')->layout("layouts.admin.app");
    }
}
