<?php

namespace App\Livewire\Admin\Includes\SupTickets;

use App\Events\AdminReliedToTicketEvent;
use App\Models\SupportTicket;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ManageTicketModal extends Component
{
    protected $listeners = ["openManageTicketModal"]; // This will listen for the "openManageTicketModal".
    public $supportTicket; // This will hold the account data to be displayed in the modal
    public $supportTicketId;

    public $clientName, $subject, $message, $replyMessage;  // this hold all the value of the of the model

    /* this method sets the account property to a new instance of the Support Ticket when the component is mounted. 
    This ensures that the account property is always defined and can be used in the view without causing errors,*/ 
    public function mount()
    {
        $this->supportTicket = new SupportTicket();
    }


    /* This method will be called when the "View" button is clicked in the support Ticket Table component. It will receive the supportTicket ID as a parameter, 
    find the corresponding account in the database, and set it to the account property. This allows the modal to display the account's information.*/
    public function  openManageTicketModal($supportTicketId){
        
        // find the Support ticket id from the database and fetch it user
        $this->supportTicket = SupportTicket::with("user")->findOrFail($supportTicketId);

        $this->supportTicketId = $this->supportTicket->id; // make the id a public property

        // update  the "Status" and "Priority" colum to indicate that it has been viewed
        $this->supportTicket->status = "In Progress";
        $this->supportTicket->priority = "Medium";
        $this->supportTicket->save();

        // fill in the manage model field with the user data 
        if ($this->supportTicket->user) { // Check if the user relationship exists andd fetch the user name
            $this->clientName = $this->supportTicket->user->first_name . ' ' . $this->supportTicket->user->last_name;
        }

        $this->subject = $this->supportTicket->subject;
        $this->message = $this->supportTicket->message;
        $this->replyMessage = "";
        
    }


    // this method will be called when the "Save Changes" button is clicked in the edit account modal.
    // sending reply by admin also update this modal 
      public function sendReply(){

        $this->validate([
            "replyMessage" => "required|string",
        ]);

        // find the Support ticket id from the database and fetch it user
        $this->supportTicket = SupportTicket::with('user')->findOrFail($this->supportTicketId);

        // Update account information
        $this->supportTicket->admin_reply = $this->replyMessage;
        $this->supportTicket->status = "Resolved";
         $this->supportTicket->priority = "Low";
        $this->supportTicket->replied_by = Auth::guard("admin")->user()->first_name . " " . Auth::guard("admin")->user()->last_name; 
        $this->supportTicket->save(); // save it to account model

        $user = $this->supportTicket; // assign this to user varable for the sake of event
        
        // this event handles the sending of admin reply to user email.
        event(new AdminReliedToTicketEvent($user));

       // dispatch an event to notify the AccountsTable component that the account has been updated
        $this->dispatch('ticket-updated'); 
    }


    /** Reset the user property to a fresh instance.
     * This will be called when the modal is closed so that the
     * previous user data doesn't linger in the component. */
    public function resetUser()
    {
        $this->supportTicket = new SupportTicket();
    }

    public function render()
    {
        return view('livewire.admin.includes.sup-tickets.manage-ticket-modal', ["supportTicket" =>  $this->supportTicket]);
    }
}






