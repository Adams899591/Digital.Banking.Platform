<?php

namespace App\Livewire\User\Includes\SupportCenter;

use App\Events\UserTypingEvent;
use App\Models\Admin;
use App\Models\ChatMessage;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
 
class LiveChatModal extends Component
{
    use WithFileUploads;
    public $chatFile, $chatMessage; // this hold the form porperty

    // this handles the brocasting of user typing to admin
//     public function typing(){

//         $adminId =  Auth::user()->assigned_admin_id; // get the admin assign to the authenticated user 
//         $customerSupport  = Admin::findOrFail($adminId); // find the admin on the admin table 
//         // store is as customerSupport to be used on the live-chat-model header

//         $user = Auth::user();
       

//        event(new UserTypingEvent( $user, $customerSupport));
//     }

    // this method handles the submission of the user chat to admin
    public function userSubmitChat(){

       $this->validate([
        'chatMessage' => 'nullable|string|max:255',
        'chatFile' => 'nullable|file|max:10240', // Max file size of 10MB
       ]);

       // save file if exists
       if($this->chatFile){
          $filePath = $this->chatFile->store('chat_files', 'public');
       }

       // save chat message
       $user = new ChatMessage;
       $user->sender_id = Auth::id();
       $user->message = $this->chatMessage;
       $user->file_path = $filePath ?? null;
       $user->receiver_id  =  Auth::user()->assigned_admin_id; // get the Customer Support fron the admin assign to the user on the user table
       $user->sender_type = "user";
       $user->receiver_type = "admin";
       $user->read_at = null;
       $user->save();
       
        // reset form
       $this->reset();

       // scroll to bottom
       $this->dispatch('scroll-chat-to-bottom');



    }

    
    // update the read_at column for the chat messages when the user click on the start chat button to open the live chat modal
    // indicating that the message sent by the admin has been read by the user 
    public function updateReadChatAt(){

         ChatMessage::where("sender_id", Auth::user()->assigned_admin_id)
                    ->where("sender_type", "admin")
                    ->where("receiver_id", Auth::id())
                    ->where("receiver_type", "user")
                    ->whereNull("read_at")
                    ->update(["read_at" => now()]);
    }


    public function render()
    {
            // fetch chat messag  
            $chatMessages  =  ChatMessage::where(function($query){
                                $query->where("sender_id", Auth::id())
                                        ->where("sender_type", "user")
                                        ->where("receiver_id", Auth::user()->assigned_admin_id)
                                        ->where("receiver_type", "admin");
                                })->orWhere(function($query){
                                $query->where("sender_id", Auth::user()->assigned_admin_id)
                                        ->where("sender_type", "admin")
                                        ->where("receiver_id", Auth::id())
                                        ->where("receiver_type", "user");
                                })->get();

        
       // i dispatch this event here so that the user get see Customer Supporter message once it is been sent
       $this->dispatch('scroll-chat-to-bottom');

        
        $adminId =  Auth::user()->assigned_admin_id; // get the admin assign to the authenticated user 
        $customerSupport  = Admin::findOrFail($adminId); // find the admin on the admin table 
        // store is as customerSupport to be used on the live-chat-model header
       
        
        return view('livewire.user.includes.support-center.live-chat-modal', compact('chatMessages',"customerSupport"));
    }
}
 