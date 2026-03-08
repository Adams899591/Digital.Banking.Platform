<?php

namespace App\Livewire\User;

use Livewire\Component;

class Cards extends Component
{
    public function render()
    {
        return view('livewire.user.cards')->layout("layouts.user.app");
    }
}
