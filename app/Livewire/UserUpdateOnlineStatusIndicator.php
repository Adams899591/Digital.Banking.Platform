<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;

class UserUpdateOnlineStatusIndicator extends Component
{


    // this handles the user online and offline status handles by wire:pool
    public function updateOnlineStatus(){
            $user = auth()->user();
            $user->last_seen = Carbon::now();
            $user->save();
    }

    public function render()
    {
        return view('livewire.user-update-online-status-indicator');
    }
}
