<?php
Route::post('/api/megafon/index', ['as' => 'megafon.index',
    'uses' => 'MegafonVirtualAts\Controllers\MegafonController@index'
]);