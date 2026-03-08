<?php

namespace App\Livewire\Admin\Includes\Layouts;

use App\Models\Notification;
use Livewire\Component;

class NotificationBell extends Component
{

    public $notificationId; // get the notification id when a notification is clicked

   // this method update all notifications as read when clicked
    public function MarkAllNotificationsAsRead(){

        $n = Notification::where("title", "=", "Support Ticket")
                                       ->where("read_status", 0)->latest()->get();

        foreach($n as $notification){
            $notification->read_status = true; // update the read status to true
            $notification->save(); // save the changes to the database
        }
              

    }


      // this method will update the read status of the notification to true when a notification is clicked
    public function UpdateReadStatus($notificationId){

        $this->notificationId = $notificationId;
             
        $notification = Notification::find($this->notificationId); // find the notification by id

            $notification->read_status = true; // update the read status to true
            $notification->save(); // save the changes to the database

            // redirect to the notifications page after updating the read status and navigate to the notifications page
            return $this->redirectRoute("admin.notifications", navigate: true);

      
    }

    public function render()
    {
        // fetch all notification that has the titile of Support Ticket
        $notifications = Notification::where("title", "=", "Support Ticket")->where("read_status", 0)->latest()->get();

        return view('livewire.admin.includes.layouts.notification-bell', ["notifications" =>  $notifications ]);
    }
}
