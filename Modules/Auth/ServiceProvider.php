<?php

namespace Modules\Auth;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class ServiceProvider extends LaravelServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/Routes/api.php');
    }
}