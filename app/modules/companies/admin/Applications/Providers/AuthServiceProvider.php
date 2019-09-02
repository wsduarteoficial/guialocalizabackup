<?php

namespace GuiaLocaliza\Companies\Admin\Applications\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use GuiaLocaliza\Companies\Admin\Domains\Models\User\User;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        //\App\Models\User::class => \App\Policies\Control\UserPolicy::class,
    ];

    /**
     *
     * Desativar para rodar as migrations
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {

        $this->registerPolicies($gate);

 
        $gate->define('isAdmin', function (User $user){

            return $user->admin == true;

        });

    }

}