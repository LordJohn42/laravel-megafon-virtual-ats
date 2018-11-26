<?php

namespace MegafonVirtualAts\Contracts;


use Illuminate\Http\Request;

interface IAtsToCrm
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function history(Request $request);

    /**
     * @param Request $request
     * @return mixed
     */
    public function event(Request $request);

    /**
     * @param Request $request
     * @return mixed
     */
    public function contact(Request $request);
}