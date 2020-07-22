<?php

namespace App\Events\User\Admin;

use App\Entities\Section;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SectionPosted
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    /**
     * @var Section
     */
    public $section;

    /**
     * Create a new event instance.
     *
     * @param Section $section
     */
    public function __construct(Section  $section)
    {
        //
        $this->section = $section;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
