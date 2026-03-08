<?php

namespace App\Livewire\Admin;

use App\Models\Transaction;
use App\Models\User;
use Livewire\Component;

class Dashboard extends Component
{

      


    public function render()
    {

        $users = User::latest()->limit(5)->get(); // get the latest 3 users
        $transactions =  Transaction::with("sender")->with("receiver")->latest()->limit(4)->get(); // get the latest 4 transactions with sender and receiver relationships
           
        
        

        return view('livewire.admin.dashboard', ["users" => $users, "transactions" => $transactions])->layout("layouts.admin.app");
    }
}
