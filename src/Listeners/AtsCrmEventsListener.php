<?php

namespace MegafonVirtualAts\Listeners;

use MegafonVirtualAts\Events\AtsCrmEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

/**
 * Base Class AtsCrmEventsListener
 * @package MegafonVirtualAts\Listeners
 */
class AtsCrmEventsListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  AtsCrmEvent  $event
     * @return void
     */
    public function handle(AtsCrmEvent $event)
    {
        //
    }

    public function onCall($event)
    {

    }

    public function onHistory($event){

    }

    public function onContact($event)
    {
        
    }
}
