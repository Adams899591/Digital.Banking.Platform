<?php

namespace App\Livewire\User\Includes\Transfer;

use App\Models\Transaction;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class RecentBeneficiaries extends Component
{
    use WithPagination;

    public function render()
    {
        // Fetch recent beneficiaries for the logged-in user
        $transactions = Transaction::with("receiver")->where("transaction_type", "=", "Credit")->where("sender_id", Auth::id())->latest()->SimplePaginate(3);
        
        return view('livewire.user.includes.transfer.recent-beneficiaries', [ "transactions" =>  $transactions]);
    }
}
