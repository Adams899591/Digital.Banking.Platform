<?php

namespace App\Livewire\User\Includes\Layouts;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification as ModelsNotification;

class NotificationBell extends Component
{
    public $notificationId; // get the notification id when a notification is clicked

   // this method update all notifications as read when clicked
    public function MarkAllNotificationsAsRead(){

        $n = Auth::user()->notifications()->whereIn("title", ["Credit Alert", "Debit Alert"])
                                           ->where("read_status", false)->latest()->get();

        foreach($n as $notification){
            $notification->read_status = true; // update the read status to true
            $notification->save(); // save the changes to the database
        }
              

    }

   // this method will update the read status of the notification to true when a notification is clicked
   public function UpdateReadStatus($notificationId){

        $this->notificationId = $notificationId;
             
        $notification = ModelsNotification::find($this->notificationId); // find the notification by id

        if ($notification && $notification->notifiable_id === Auth::id()) { // check if the notification exists and belongs to the authenticated user
            $notification->read_status = true; // update the read status to true
            $notification->save(); // save the changes to the database

            // redirect to the notifications page after updating the read status and navigate to the notifications page
            return $this->redirectRoute("user.notifications", navigate: true);
            
            // dd( $this->notificationId );
        }
      
   }

    public function render()
    {

        // fetch notification where the login user is Creditd and Debited and read status is false
        $notifications = Auth::user()->notifications()->whereIn("title", ["Credit Alert", "Debit Alert"])->where("read_status", false)->latest()->get();
      
        return view('livewire.user.includes.layouts.notification-bell', ["notifications" => $notifications]);
    }
}
