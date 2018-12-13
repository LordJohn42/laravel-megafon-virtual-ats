<?php

namespace MegafonVirtualAts\Contracts;


use Illuminate\Http\Request;

interface IAtsToCrm
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request);
}