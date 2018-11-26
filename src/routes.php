<?php
Route::post('megafon/history', ['as' => 'megafon.history',
    'uses' => 'MegafonVirtualAts\Controllers\MegafonController@history'
]);
Route::post('megafon/event', ['as' => 'megafon.event',
    'uses' => 'MegafonVirtualAts\Controllers\MegafonController@event'
]);
Route::post('megafon/contact', ['as' => 'megafon.contact',
    'uses' => 'MegafonVirtualAts\Controllers\MegafonController@contact'
]);
