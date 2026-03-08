<?php

namespace App\Livewire\Admin;

use App\Models\Transaction as TransactionModel;
use Livewire\Component;
use Livewire\WithPagination;

class Transactions extends Component
{
    use WithPagination;

    public $selectedTransaction;
    public $showTransactionModal = false;

    public function viewTransaction($transaction_id)
    {
        $this->selectedTransaction = TransactionModel::with('sender', 'receiver')->find($transaction_id);
        $this->showTransactionModal = true;
    }

    public function closeModal()
    {
        $this->showTransactionModal = false;
        $this->selectedTransaction = null;
    }

    public function render()
    {
        
        // use the imported TransactionModel alias instead of nonexistent TransactionsModel
        $transactions = TransactionModel::with("sender")->with("receiver")->latest()->paginate(3);

        return view('livewire.admin.transactions', ["transactions" => $transactions])->layout("layouts.admin.app");
    }
}
