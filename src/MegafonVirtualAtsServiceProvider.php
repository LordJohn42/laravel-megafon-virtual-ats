<?php

namespace MegafonVirtualAts;

use Illuminate\Support\ServiceProvider;

class MegafonVirtualAtsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        include __DIR__.'/routes.php';
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('MegafonVirtualAts\Controllers\MegafonController');
    }
}
