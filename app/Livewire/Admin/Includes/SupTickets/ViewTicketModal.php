<?php

namespace App\Livewire\Admin\Includes\SupTickets;

use App\Models\SupportTicket;
use Livewire\Component;

class ViewTicketModal extends Component
{
    protected $listeners = ["openViewTicketModal"]; // This will listen for the "openViewTicketModal".
    public $supportTicket; // This will hold the account data to be displayed in the modal

    // public $clientName, $subject, $message, $replyMessage;  // this hold all the value of the of the model

    /* this method sets the account property to a new instance of the Support Ticket model when the component is mounted. 
    This ensures that the account property is always defined and can be used in the view without causing errors,*/ 
    public function mount()
    {
        $this->supportTicket = new SupportTicket();
    }


    /* This method will be called when the "View" button is clicked in the support Ticket Table component. It will receive the supportTicket ID as a parameter, 
    find the corresponding account in the database, and set it to the account property. This allows the modal to display the account's information.*/
    public function  openViewTicketModal($supportTicketId){
        
        // find the Support ticket id from the database and fetch it user
        $this->supportTicket = SupportTicket::with("user")->findOrFail($supportTicketId);
        
    }

    public function render()
    {
        return view('livewire.admin.includes.sup-tickets.view-ticket-modal', ["supportTicket" =>  $this->supportTicket]);
    }
}
 