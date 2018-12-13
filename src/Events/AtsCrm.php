<?php

namespace MegafonVirtualAts\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class AtsCrm extends Event
{
    use SerializesModels;

    public $data;

    public $cmd;

    protected $sign;

    /**
     * Create a new event instance.
     *
     * @param $request
     * @param $cmd
     */
    public function __construct($request, $cmd)
    {
        $this->data = $request->all();
        $this->cmd = $cmd;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return ['megafon.' . $this->cmd];
    }

    public function broadcastAs()
    {
        return 'megafon';
    }
}
