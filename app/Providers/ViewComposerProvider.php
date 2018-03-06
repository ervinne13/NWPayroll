<?php

namespace App\Providers;

use App\ViewComposers\GeneralViewComposer;
use App\ViewComposers\Layout\MetronicViewComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewComposerProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        View::composer('layouts.metronic.admin', MetronicViewComposer::class);
        View::composer('*', GeneralViewComposer::class);
    }

}
