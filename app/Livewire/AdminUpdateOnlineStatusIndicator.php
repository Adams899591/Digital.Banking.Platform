<?php

namespace App\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AdminUpdateOnlineStatusIndicator extends Component
{
    // this handles the user online and offline status handles by wire:pool
    public function updateOnlineStatus(){
            $user = Auth::guard("admin")->user();
            $user->last_seen = Carbon::now();
            $user->save();
    }

    public function render()
    {
        return view('livewire.admin-update-online-status-indicator');
    }
}
