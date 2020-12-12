<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(
            ['htbs/*','luckys/*','dashboard/*','pathans/*'], 'App\Http\View\Composers\SettingComposer'
        );

    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
