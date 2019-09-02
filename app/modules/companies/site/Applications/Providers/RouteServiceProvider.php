<?php

namespace GuiaLocaliza\Companies\Site\Applications\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;


/**
 * Class RouteServiceProvider
 * @package GuiaLocaliza\Companies\Site\Applications\Providers
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class RouteServiceProvider extends ServiceProvider
{

    protected $namespace = 'GuiaLocaliza\Companies\Site\Applications\Http\Controllers';


    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

        $this->mapCompaniesAdsRoutes();
        $this->mapHomeRoutes();
       
        $this->mapCompaniesSeoRoutes();
        $this->mapCompaniesSearchRoutes();
        $this->mapCompaniesAjaxRoutes();
        $this->mapPagesRoutes();
        $this->loadViewsFrom(dirname(dirname(__DIR__)).'/Presentations/resources/views', 'site');

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
     * Define the "web" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapHomeRoutes()
    {
        Route::prefix('/')
            //->domain(env('APP_URL'))
            ->middleware('web')
            ->namespace($this->namespace)
            ->as('site.')
            ->group(base_path('app/modules/companies/site/Applications/routes/site.php'));
    }

    protected function mapCompaniesSearchRoutes()
    {
        Route::prefix('/empresa/busca/')
            //->domain(env('APP_URL'))
            ->middleware('web')
            ->namespace($this->namespace)
            ->as('companies.search.')
            ->group(base_path('app/modules/companies/site/Applications/routes/companies.search.php'));
    }

    protected function mapCompaniesAdsRoutes()
    {
        Route::prefix('/companies/ads/')
            //->domain(env('APP_URL'))
            ->middleware('web')
            ->namespace($this->namespace)
            ->as('companies.ads.')
            ->group(base_path('app/modules/companies/site/Applications/routes/companies.ads.php'));
    }

    protected function mapCompaniesAjaxRoutes()
    {
        Route::prefix('/companies/ajax/')
            //->domain(env('APP_URL'))
            ->middleware('api')
            ->namespace($this->namespace)
            ->as('companies.ajax.')
            ->group(base_path('app/modules/companies/site/Applications/routes/companies.ajax.php'));
    }

    protected function mapCompaniesSeoRoutes()
    {
        Route::prefix('/e/')
            //->domain(env('APP_URL'))
            ->middleware('web')
            ->namespace($this->namespace)
            ->as('companies.seo.')
            ->group(base_path('app/modules/companies/site/Applications/routes/companies.seo.php'));
    }

    protected function mapPagesRoutes()
    {
        Route::prefix('/p/')
            //->domain(env('APP_URL'))
            ->middleware('web')
            ->namespace($this->namespace)
            ->as('pages.')
            ->group(base_path('app/modules/companies/site/Applications/routes/pages.php'));
    }

}
