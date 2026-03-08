<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UserTypingEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public $user;
    public $customerSupport;

    public function __construct($user, $customerSupport)
    {
        //
        $this->user = $user;
        $this->customerSupport = $customerSupport;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('user-typing-channel.' . $this->customerSupport->id),
            // new PrivateChannel('user-typing-channel.' . $this->user->id . '.' . $this->customerSupport->id),
            // new PrivateChannel('customer-support-typing-channel.' . $this->customerSupport->id . '.' . $this->user->id)
        ];
    }
}
