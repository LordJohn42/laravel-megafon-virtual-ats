<?php
Route::post('megafon/entry_point', ['as' => 'megafon.entry_point',
    'uses' => 'MegafonVirtualAts\Controllers\MegafonController@index'
]);