<?php

namespace App\Livewire\User;

use App\Models\ChatMessage;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SupportCenters extends Component
{


    public function render()
    {
        return view('livewire.user.support-centers')->layout("layouts.user.app");
    }
}
