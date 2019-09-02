<?php

namespace GuiaLocaliza\Companies\Api\v1\Applications\Providers;

use GuiaLocaliza\Companies\Api\v1\Domains\Models\Empresas\EmpresasRepository;
use GuiaLocaliza\Companies\Api\v1\Domains\Models\User\UserRepository;
use GuiaLocaliza\Companies\Api\v1\Infrastructures\Domains\Empresas\EloquentEmpresasRepository;
use GuiaLocaliza\Companies\Api\v1\Infrastructures\Domains\User\EloquentUserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
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

        $this->app->bind(
            UserRepository::class,
            EloquentUserRepository::class
        );

        $this->app->bind(
            EmpresasRepository::class,
            EloquentEmpresasRepository::class
        );

    }
}
