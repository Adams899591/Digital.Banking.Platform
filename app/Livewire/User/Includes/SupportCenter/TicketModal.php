<?php

namespace App\Livewire\User\Includes\SupportCenter;

use App\Models\SupportTicket;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TicketModal extends Component
{
    public $category;
    public $subject;
    public $message;


    // this handles the form submission for creating a new support ticket. 
    public function submitTicket(){

       // run validation
         $this->validate([
            'category' => 'required',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        
        $user = new SupportTicket(); // create a new instance of the SupportTicket model

        $this->authorize('Supportcreate', SupportTicket::class); // ensure the user is authorized to create a support ticket

        // populate the support ticket with the form data and save it to the database
        $user->user_id = Auth::id();
        $user->reference = "#TCK-" . date("Y") . "-" . rand(100, 900);
        $user->category = $this->category;
        $user->message = $this->message;
        $user->subject = $this->subject;
        $user->priority = "High";
        $user->status = "Not Open";
        $user->save();

        // insert into notification table 
         Auth::user()->notifications()->create([
            "title" => "Support Ticket",
            "message" =>  Auth::user()->first_name . " " . Auth::user()->last_name .  " submitted a new support ticket",
            "read_status" => false,
        ]);
        
        $this->reset();  // resets the inputs field! 

        // dispatch success model 
        $this->dispatch('ticket-success');
    }

    public function render()
    {
        return view('livewire.user.includes.support-center.ticket-modal');
    }
}
