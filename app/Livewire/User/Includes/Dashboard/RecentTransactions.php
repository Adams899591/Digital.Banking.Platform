<?php

namespace App\Livewire\User\Includes\Dashboard;

use Livewire\Component;
use App\Helpers\Services\user\DashboardHelper;

class RecentTransactions extends Component
{

    public function render(DashboardHelper $dashboardHelper)
    {
        $transactions = $dashboardHelper->haldlesTransactionsSentAndReceiveByAuth_User();

        return view('livewire.user.includes.dashboard.recent-transactions', ["transactions" => $transactions]);
    }
}
