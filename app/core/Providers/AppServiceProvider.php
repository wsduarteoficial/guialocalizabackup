<?php

namespace GuiaLocaliza\Providers;

use Illuminate\Support\ServiceProvider;
use Faker\Generator as FakerGenerator;
use Faker\Factory as FakerFactory;
use DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //$this->dotEnv('.env.core.application');

        // DB::listen(function($query){
        //     //$q = $query->sql;
        //     //$q = $query->bindings;
        //     $q = $query->time;
        //     var_dump($q);
        //     echo "<br>";
        // });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(FakerGenerator::class, function () {
            return FakerFactory::create('pt_BR');
        });
    }

    private function dotEnv($env)
    {
        $dotenv = new \Dotenv\Dotenv(base_path(),$env);
        $dotenv->overload();
    }
}
