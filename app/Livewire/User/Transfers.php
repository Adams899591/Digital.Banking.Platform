<?php

namespace App\Livewire\User;

use Carbon\Carbon;
use Livewire\Component;
use App\Helpers\Services\user\TransferHelper;

class Transfers extends Component
{
    


    public function render(TransferHelper $transferHelper)
    {
       // calculate total Accounts Balance   
        $total = $transferHelper->totalAccountsBalance(); 

        return view('livewire.user.transfers', ["total" => $total])->layout("layouts.user.app");
  
    }
}
