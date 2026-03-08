<?php

namespace App\Livewire\Admin;

use App\Models\ChatMessage;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class LiveChats extends Component
{

    use WithFileUploads;
    public $chatFile, $chatMessage;  // this hold the public property for the chat form
    public $openUserChatId;  // this public property hold the id of the passed user to be  chat by the admin
    public $SearchUserInput; // this handles the search input



    // this method help me to get the last message of every conversation made between admin and users 
    public function getLastMessage($userId)
    {
        // return the most recent chat message exchanged between the currently
        // authenticated admin and the given user id.
        return ChatMessage::where(function($query) use ($userId) {
                    $query->where('sender_id', Auth::guard('admin')->user()->id)
                          ->where('sender_type', 'admin')
                          ->where('receiver_id', $userId)
                          ->where('receiver_type', 'user');
                })->orWhere(function($query) use ($userId) {
                    $query->where('sender_id', $userId)
                          ->where('sender_type', 'user')
                          ->where('receiver_id', Auth::guard('admin')->user()->id)
                          ->where('receiver_type', 'admin');
                })->latest()->first();
    }
    
   // update the read_at column for the chat messages when the admin click on the start chat button to open the live chat
    // indicating that the message sent by the user has been read by the admin
    public function updateReadChatAt(){

         ChatMessage::where("sender_id", $this->openUserChatId )
                    ->where("sender_type", "user")
                    ->where("receiver_id", Auth::guard("admin")->user()->id)
                    ->where("receiver_type", "admin")
                    ->whereNull("read_at")
                    ->update(["read_at" => now()]);
    }

    // when the method is called it get the user id and make it globaly accessable  
    public function openChat($openUserChatId){
         $this->openUserChatId = $openUserChatId; // get the sellected user id and make it accessable to other function for used
         $this->updateReadChatAt();  //  run this method when ever a admin selected a user to chat 
        
         // trigger scroll to bottom when opening a chat
         $this->dispatch('scroll-chat-to-bottom');
    }

    // the method handles the submission of admin reply to user which was sellected
    public function adminSubmitChat(){

       $this->validate([
        'chatMessage' => 'nullable|string|max:255',
        'chatFile' => 'nullable|file|max:10240', // Max file size of 10MB
       ]);

       // save file if exists
       if($this->chatFile){
          $filePath = $this->chatFile->store('chat_files', 'public');
       }

       // save chat message
       $admin = new ChatMessage;
       $admin->sender_id = Auth::guard("admin")->user()->id;
       $admin->message = $this->chatMessage;
       $admin->file_path = $filePath ?? null;
       $admin->receiver_id  =   $this->openUserChatId; // this hold the sellected user id
       $admin->sender_type = "admin";
       $admin->receiver_type = "user";
       $admin->read_at = null;
       $admin->save();
       
       // scroll to bottom
       $this->dispatch('scroll-chat-to-bottom');

        // reset form
       $this->reset("chatFile","chatMessage");




    }


 

    public function render()
    {
            // fetch chat messages for the currently selected conversation or default user
            $chatMessages  =  ChatMessage::where(function($query){
                                $query->where("sender_id", Auth::guard("admin")->user()->id)
                                        ->where("sender_type", "admin")
                                        ->where("receiver_id", $this->openUserChatId)
                                        ->where("receiver_type", "user");
                                })->orWhere(function($query){
                                $query->where("sender_id", $this->openUserChatId)
                                        ->where("sender_type", "user")
                                        ->where("receiver_id", Auth::guard("admin")->user()->id)
                                        ->where("receiver_type", "admin");
                                })->get(); 


         // fetch all user assigned to the currently authenticated admin
        if ($this->SearchUserInput) {
            // fetch users assigned to the currently authenticated admin and filter them based on the search input
            $users = User::where("assigned_admin_id", Auth::guard("admin")->user()->id)
                        ->where(function($query) {
                            $query->where("first_name", "like", "%{$this->SearchUserInput}%")
                                  ->orWhere("last_name", "like", "%{$this->SearchUserInput}%");
                        })
                        ->get();
        }else{
            // fetch all user assigned to the currently authenticated admin
            $users = User::where("assigned_admin_id", Auth::guard("admin")->user()->id)->get();
        }

        // when a user is selected find that user and fill in the chat header section
        $selectedUser =  User::find($this->openUserChatId); 
        
        

        return view('livewire.admin.live-chats',compact("chatMessages","users","selectedUser"))->layout("layouts.admin.app");
    }
}
