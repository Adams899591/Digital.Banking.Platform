<?php

namespace App\Livewire\Admin\Includes\SupTickets;

use App\Helpers\Services\admin\SupportTicketHelper;
use Livewire\Component;
use Livewire\WithPagination;

class TicketsTable extends Component
{   

   use WithPagination;
   public $supportTicket_id; // This will hold the ID of the Support Ticket

   public $status, $priority, $category, $search;

    /* This method will be called when the "Manage" button is clicked in the ticket table.*/
    public function openManageModal($supportTicket_id){

        $this->supportTicket_id = $supportTicket_id;
        $this->dispatch('openManageTicketModal', supportTicketId:  $this->supportTicket_id); // dispatches an event named "openManageTicketModal" with the Ticket ID as a parameter. 
    }

   /* This method will be called when the "Manage" button is clicked in the ticket table.*/
    public function openViewModal($supportTicket_id){
        $this->supportTicket_id = $supportTicket_id;
        $this->dispatch('openViewTicketModal', supportTicketId:  $this->supportTicket_id); // dispatches an event named "openViewTicketModal" with the Ticket ID as a parameter. 

    }

    

    // These methods will be called when the corresponding filter options (status).
    public function fetchUserByStatuses($status){
       $this->status = $status;
    }

    // These methods will be called when the corresponding filter options (priority).
    public function fetchUserByPriorities($priority){
       $this->priority = $priority;
    }

    // These methods will be called when the corresponding filter options (category).
    public function fetchUserByCategories($category){
       $this->category = $category;
    }




    public function render(SupportTicketHelper $supportTicketHelper)
    {

        // Fetch the support tickets based on the selected filters and search query using the SupportTicketHelper class. The handlesFilteredSupportTicket method is called with the current values of the filters and search query, and it returns the filtered support tickets which are then passed to the view for rendering.
        $supportTickets   = $supportTicketHelper->handlesFilteredSupportTicket($this->status,$this->category,$this->priority,$this->search);
 

        return view('livewire.admin.includes.sup-tickets.tickets-table',["supportTickets" => $supportTickets]);
    }
}
