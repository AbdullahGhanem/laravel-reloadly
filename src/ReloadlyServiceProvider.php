<?php

namespace Ghanem\Reloadly;

use Illuminate\Support\ServiceProvider;

class ReloadlyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/reloadly.php', 'reloadly');

        $this->app->bind('ghanem-reloadly', function () {
            return new ReloadlyController;
        });

    }
    
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/reloadly.php' => config_path('reloadly.php'),
        ], 'config');
    }
}
