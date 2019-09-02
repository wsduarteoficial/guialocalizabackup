<?php

namespace GuiaLocaliza\Companies\Api\v1\Applications\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;


class RouteServiceProvider extends ServiceProvider
{

    protected $namespace = 'GuiaLocaliza\Companies\Api\v1\Applications\Http\Controllers';


    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

        $this->mapApiRoutes();
        $this->loadViewsFrom(dirname(dirname(__DIR__)).'/Presentations/resources/views', 'api');

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
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
        Route::prefix('/api/v1')
            //->domain(env('API_URL', ''))
            ->middleware('api')
            ->namespace($this->namespace)
            ->as('companies.api.')
            ->group(base_path('app/modules/companies/api/v1/Applications/routes/api.php'));
    }

}
