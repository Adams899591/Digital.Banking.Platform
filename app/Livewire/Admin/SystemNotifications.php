<?php

namespace App\Livewire\Admin;

use App\Models\Notification;
use Livewire\Component;
use Livewire\WithPagination;

class SystemNotifications extends Component
{
      use WithPagination;
      public $notificationId; // get the notification id when a notification is clicked


   // this method will update the read status of the notification to true when a notification is clicked
   public function UpdateReadStatus($notificationId){

        $this->notificationId = $notificationId;
             
            $notification = Notification::find($this->notificationId); // find the notification by id

            $notification->read_status = true; // update the read status to true
            $notification->save(); // save the changes to the database
      
   }
   
    public function render()
    {
        // fetch all notification that has the titile of Support Ticket
        $notifications = Notification::where("title", "=", "Support Ticket")->paginate(3);
       
        return view('livewire.admin.system-notifications', ["notifications" => $notifications])->layout("layouts.admin.app");
    }
}
