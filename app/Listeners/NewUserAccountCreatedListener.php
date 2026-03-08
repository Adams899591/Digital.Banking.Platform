<?php

namespace App\Listeners;

use App\Events\NewUserAccountCreatedEvent;
use App\Notifications\NewUserAccountCreatedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class NewUserAccountCreatedListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
   
    }

    /**
     * Handle the event.
     */
    public function handle(NewUserAccountCreatedEvent $event): void
    {
           // send notification to the user
            Notification::route("mail", $event->user['email'])->notify(new NewUserAccountCreatedNotification($event->user));
       
       
    }
}
