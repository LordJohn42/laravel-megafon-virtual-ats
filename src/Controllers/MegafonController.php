<?php

namespace MegafonVirtualAts\Controllers;

use Illuminate\Http\Request;
use MegafonVirtualAts\Events\AtsCrmEvent;
use Event;
use Log;

class MegafonController extends \App\Http\Controllers\Controller implements \MegafonVirtualAts\Contracts\IAtsToCrm
{

    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        // TODO: event type
        Event::fire(new AtsCrmEvent($request, 'history'));
        Log::debug('Request from megafon', ['request' => $request]);
    }
}