<?php

namespace App\Listeners;

use App\Notifications\AdminReliedToTicketNotification;
use App\Events\AdminReliedToTicketEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class AdminReliedToTicketListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(AdminReliedToTicketEvent $event): void
    {
          // send notification to the user
            Notification::route("mail", $event->user->user->email)->notify(new AdminReliedToTicketNotification($event->user));
       
    }
}
