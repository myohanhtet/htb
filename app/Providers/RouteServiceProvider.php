<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();
        $this->mapBackRoutes();
        $this->mapFrontRoutes();

        // $this->mapWebRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    protected function mapBackRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace . '\\Back')
            ->group(function () {
                Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
                Route::post('/login', 'Auth\LoginController@login');
                Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
                Route::prefix('admin')->group(function () {
                    Route::middleware('auth')->group(base_path('routes/back.php'));
                });
            });
    }

    protected function mapFrontRoutes()
    {
        Route::middleware(['web'])
            ->namespace($this->namespace . '\\Front')
            ->group(base_path('routes/front.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace. '\\API')
             ->group(base_path('routes/api.php'));
    }
}
