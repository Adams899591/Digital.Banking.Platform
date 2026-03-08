<?php

namespace App\Livewire\User;

use Dom\TokenList;
use Livewire\Component;
use App\Models\Transaction;
use Masmerise\Toaster\Toaster;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Notification as ModelsNotification;
use Livewire\WithPagination;

class Notification extends Component
{
    use WithPagination;
   public $notificationId; // get the notification id when a notification is clicked


   // this method will update the read status of the notification to true when a notification is clicked
   public function UpdateReadStatus($notificationId){

        $this->notificationId = $notificationId;
             
        $notification = ModelsNotification::find($this->notificationId); // find the notification by id

        if ($notification && $notification->notifiable_id === Auth::id()) { // check if the notification exists and belongs to the authenticated user
            $notification->read_status = true; // update the read status to true
            $notification->save(); // save the changes to the database
        }
      
   }


    public function render()
    {
        // fetch notification where the login user is Creditd and Debited

        //  $notifications = Auth::user()->notifications()->where("title", "Credit Alert")->orWhere("title", "Debit Alert")->latest()->get();
         $notifications = Auth::user()->notifications()->whereIn("title", ["Credit Alert", "Debit Alert"])->latest()->paginate(2);

        return view('livewire.user.notification', ["notifications" => $notifications])->layout("layouts.user.app");
    }
}
 