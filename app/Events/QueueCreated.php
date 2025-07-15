<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\QueueNumber;

class QueueCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public $queue;
    public function __construct(QueueNumber $queue)
    {
        $this->queue = $queue->load('service');
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('queue-services'),
        ];
    }
    public function broadcastWith()
    {
        return [
            'id' => $this->queue->id,
            'number' => $this->queue->number,
            'status' => $this->queue->status,
            'service' => $this->queue->service->name,
        ];
    }
}
