<?php

namespace App\Events;

use AllowDynamicProperties;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

#[AllowDynamicProperties] class StatsUpdated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public $userStats;

    public function __construct($userStats)
    {
        $this->userStats = $userStats;
    }

    public function broadcastOn()
    {
        return new Channel('user-stats');
    }
}
