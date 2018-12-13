<?php

namespace MegafonVirtualAts\Listeners;

use Illuminate\Support\Facades\Config;
use MegafonVirtualAts\Events\AtsCrm;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use MegafonVirtualAts\Exception\HandlerNotFound;

/**
 * Base Class AtsCrmEventsListener
 * @package MegafonVirtualAts\Listeners
 */
class BaseAtsCrm implements IBaseAtsCrm
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
     * @param AtsCrm $event
     * @return bool
     * @throws HandlerNotFound
     */
    public function handle(AtsCrm $event)
    {
        $method = 'on' . ucfirst($event->cmd);

        // Проверим токен, если его нету, прекратим пробрасывать событие вниз.
        // Stop propagation if no token.
        if ($event->data['crm_token'] !== Config::get('megafon.sign')) {
            return false;
        }

        if (method_exists($this, $method)) {
            $this->{$method}($event);
        } else {
            throw new HandlerNotFound('Handler to ' . $event->cmd . ' not found');
        }
    }
}
