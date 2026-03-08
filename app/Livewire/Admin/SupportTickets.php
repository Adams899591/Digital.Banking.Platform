<?php

namespace App\Livewire\Admin;

use App\Models\SupportTicket;
use Livewire\Component;
use Livewire\WithPagination;

class SupportTickets extends Component
{


    public function render()
    {
        return view('livewire.admin.support-tickets')->layout("layouts.admin.app");
    }
}
