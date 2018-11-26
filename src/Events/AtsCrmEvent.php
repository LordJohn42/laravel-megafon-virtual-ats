<?php

namespace MegafonVirtualAts\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Support\Facades\Log;

class AtsCrmEvent extends Event
{
    use SerializesModels;

    public $event;

    public $type;

    /**
     * Create a new event instance.
     *
     * @param $event
     * @param $type
     */
    public function __construct($event, $type)
    {
        $this->event = $event;
        $this->type = $type;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return ['*'];
    }

    public function broadcastAs()
    {
        return 'megafon.event';
    }
}
