<?php

namespace MegafonVirtualAts\Controllers;

use Illuminate\Http\Request;
use MegafonVirtualAts\Events\AtsCrmEvent;
use Event;

class MegafonController extends \App\Http\Controllers\Controller implements \MegafonVirtualAts\Contracts\IAtsToCrm
{

    /**
     * @param Request $request
     * @return mixed
     */
    public function history(Request $request)
    {
        Event::fire(new AtsCrmEvent($request, 'history'));
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function event(Request $request)
    {
        Event::fire(new AtsCrmEvent($request, 'event'));
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function contact(Request $request)
    {
        Event::fire(new AtsCrmEvent($request, 'contact'));
    }
}