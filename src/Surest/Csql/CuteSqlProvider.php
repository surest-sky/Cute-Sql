<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class CuteSqlProvider extends ServiceProvider
{
    protected $defer = true;
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->publishes(([
            __DIR__ . '/config/csql.php' => config_path('csql.php')
        ]));
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton('csql', function ($app) {
            return new Csql
        });
    }
}
