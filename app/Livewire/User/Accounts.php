<?php

namespace App\Livewire\User;

use Carbon\Carbon;
use Livewire\Component;
use App\Helpers\Services\user\AccountHelper;

class Accounts extends Component
{


    public function render(AccountHelper $accountHelper)
    {
        // calculate total Accounts Balance   
        $total = $accountHelper->totalAccountsBalance();

        return view('livewire.user.accounts', ["total" => $total])->layout("layouts.user.app");
    }
}
