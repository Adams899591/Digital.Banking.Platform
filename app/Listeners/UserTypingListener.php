<?php

namespace App\Listeners;

use App\Events\UserTypingEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UserTypingListener
{
    /**
     * Create the event listener.
     */

    // public $user;
    // public $customerSupport;
    public function __construct($user, $customerSupport)
    {
        //
        // $this->user = $user;
        // $this->customerSupport = $customerSupport;
    }

    /**
     * Handle the event.
     */
    public function handle(UserTypingEvent $event): void
    {
        //
    }
}
