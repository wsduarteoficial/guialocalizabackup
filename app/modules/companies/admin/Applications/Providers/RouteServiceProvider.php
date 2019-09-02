<?php

namespace GuiaLocaliza\Companies\Admin\Applications\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;


/**
 * Class RouteServiceProvider
 * @package GuiaLocaliza\Companies\Admin\Applications\Providers
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class RouteServiceProvider extends ServiceProvider
{

    protected $namespace = 'GuiaLocaliza\Companies\Admin\Applications\Http\Controllers';

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

        $this->mapHomeRoutes();
        $this->mapAccountsRoutes();
        $this->mapCompaniesRoutes();
        $this->mapCompaniesAjaxRoutes();
        $this->mapCategoriesRoutes();
        $this->mapSuggestsAjaxRoutes();
        $this->mapSubcategoriesRoutes();
        $this->mapStatesRoutes();
        $this->mapCitiesRoutes();
        $this->mapDistricts();
        $this->mapPlacesRoutes();
        $this->mapReportsRoutes();
        $this->mapZipcodesRoutes();
        $this->mapUsersRoutes();
        $this->mapSettingsRoutes();
        $this->mapPagesRoutes();
        $this->loadViewsFrom(dirname(dirname(__DIR__)).'/Presentations/resources/views', 'admin');

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
        Route::prefix('/admin')
            //->domain(env('APP_URL'))
            ->middleware(['web', 'auth'])
            ->namespace($this->namespace)
            ->as('admin.')
            ->group(base_path('app/modules/companies/admin/Applications/routes/home.php'));
    }

    protected function mapCompaniesRoutes()
    {
        Route::prefix('/admin/empresa/')
            //->domain(env('APP_URL'))
            ->middleware(['web', 'auth'])
            ->namespace($this->namespace)
            ->as('admin.companies.')
            ->group(base_path('app/modules/companies/admin/Applications/routes/companies.php'));
    }

    protected function mapCategoriesRoutes()
    {
        Route::prefix('/admin/categoria/')
            //->domain(env('APP_URL'))
            ->middleware(['web', 'auth', 'user.admin'])
            ->namespace($this->namespace)
            ->as('admin.categories.')
            ->group(base_path('app/modules/companies/admin/Applications/routes/categories.php'));
    }

    protected function mapSubcategoriesRoutes()
    {
        Route::prefix('/admin/subcategoria/')
            //->domain(env('APP_URL'))
            ->middleware(['web', 'auth', 'user.admin'])
            ->namespace($this->namespace)
            ->as('admin.subcategories.')
            ->group(base_path('app/modules/companies/admin/Applications/routes/subcategories.php'));
    }

    protected function mapStatesRoutes()
    {
        Route::prefix('/admin/estado/')
            //->domain(env('APP_URL'))
            ->middleware(['web', 'auth', 'user.admin'])
            ->namespace($this->namespace)
            ->as('admin.states.')
            ->group(base_path('app/modules/companies/admin/Applications/routes/states.php'));
    }

    protected function mapCitiesRoutes()
    {
        Route::prefix('/admin/cidade/')
            //->domain(env('APP_URL'))
            ->middleware(['web', 'auth', 'user.admin'])
            ->namespace($this->namespace)
            ->as('admin.cities.')
            ->group(base_path('app/modules/companies/admin/Applications/routes/cities.php'));
    }

    protected function mapDistricts()
    {
        Route::prefix('/admin/bairro/')
            //->domain(env('APP_URL'))
            ->middleware(['web', 'auth'])
            ->namespace($this->namespace)
            ->as('admin.districts.')
            ->group(base_path('app/modules/companies/admin/Applications/routes/districts.php'));
    }

    protected function mapPlacesRoutes()
    {
        Route::prefix('/admin/logradouro/')
            //->domain(env('APP_URL'))
            ->middleware(['web', 'auth'])
            ->namespace($this->namespace)
            ->as('admin.places.')
            ->group(base_path('app/modules/companies/admin/Applications/routes/places.php'));
    }

    protected function mapReportsRoutes()
    {
        Route::prefix('/admin/relatorio/')
            //->domain(env('APP_URL'))
            ->middleware(['web', 'auth', 'user.admin'])
            ->namespace($this->namespace)
            ->as('admin.reports.')
            ->group(base_path('app/modules/companies/admin/Applications/routes/reports.php'));
    }


    protected function mapZipcodesRoutes()
    {
        Route::prefix('/admin/cep/')
            //->domain(env('APP_URL'))
            ->middleware(['web', 'auth'])
            ->namespace($this->namespace)
            ->as('admin.zipcodes.')
            ->group(base_path('app/modules/companies/admin/Applications/routes/zipcodes.php'));
    }


    protected function mapCompaniesAjaxRoutes()
    {
        Route::prefix('/admin/ajax/')
            //->domain(env('APP_URL'))
            ->middleware(['api'])
            ->namespace($this->namespace)
            ->as('admin.ajax.')
            ->group(base_path('app/modules/companies/admin/Applications/routes/ajax.php'));
    }

    protected function mapSuggestsAjaxRoutes()
    {
        Route::prefix('/admin/ajax/suggests')
            //->domain(env('APP_URL'))
            ->middleware(['api'])
            ->namespace($this->namespace)
            ->as('admin.ajax.suggests.')
            ->group(base_path('app/modules/companies/admin/Applications/routes/suggests.php'));
    }

    protected function mapUsersRoutes()
    {
        Route::prefix('/admin/usuario')
            //->domain(env('APP_URL'))
            ->middleware(['web', 'auth', 'user.admin'])
            ->namespace($this->namespace)
            ->as('admin.users.')
            ->group(base_path('app/modules/companies/admin/Applications/routes/users.php'));
    }

    protected function mapAccountsRoutes()
    {
        Route::prefix('/admin/conta')
            //->domain(env('APP_URL'))
            ->middleware(['web', 'auth'])
            ->namespace($this->namespace)
            ->as('admin.accounts.')
            ->group(base_path('app/modules/companies/admin/Applications/routes/accounts.php'));
    }

    protected function mapSettingsRoutes()
    {
        Route::prefix('/admin/configuracao')
            //->domain(env('APP_URL'))
            ->middleware(['web', 'auth', 'user.admin'])
            ->namespace($this->namespace)
            ->as('admin.settings.')
            ->group(base_path('app/modules/companies/admin/Applications/routes/settings.php'));
    }

    protected function mapPagesRoutes()
    {
        Route::prefix('/admin/pagina')
            //->domain(env('APP_URL'))
            ->middleware(['web', 'auth', 'user.admin'])
            ->namespace($this->namespace)
            ->as('admin.pages.')
            ->group(base_path('app/modules/companies/admin/Applications/routes/pages.php'));
    }

}
