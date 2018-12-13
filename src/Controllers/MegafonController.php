<?php

namespace MegafonVirtualAts\Controllers;

use Illuminate\Http\Request;
use MegafonVirtualAts\Events\AtsCrm;
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
        Event::fire(new AtsCrm($request, $request->input('cmd')));
        _log(collect($request->all())->toJson(), 'megafon_api', true);
        // Log::debug('Request from megafon', ['body request' => $request->all()]);
    }
}