<?php

namespace App\Events\User\Admin;

use App\Entities\Installment;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class InstallmentPublished
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    /**
     * @var Installment
     */
    public $installment;

    /**
     * Create a new event instance.
     *
     * @param Installment $installment
     */
    public function __construct(Installment $installment)
    {
        $this->installment = $installment;
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
