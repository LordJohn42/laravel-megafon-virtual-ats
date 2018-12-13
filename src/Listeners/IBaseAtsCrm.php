<?php


namespace MegafonVirtualAts\Listeners;


interface IBaseAtsCrm
{
    const CALL_INCOMING = 'INCOMING';
    const CALL_ACCEPTED = 'ACCEPTED';
    const CALL_COMPLETED = 'COMPLETED';
    const CALL_CANCELLED = 'CANCELLED';
    const CALL_OUTGOING = 'OUTGOING';


//    public function onEvent($event);
//    public function onHistory($event);
//    public function onContact($event);
}