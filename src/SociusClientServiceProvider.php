<?php

namespace Grixu\SociusClient;

use Illuminate\Support\ServiceProvider;

class SociusClientServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'socius-client');

        // Register the main class to use with the facade
        $this->app->singleton('socius-client', function () {
            return new SociusClient;
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes(
                [
                    __DIR__ . '/../config/config.php' => config_path('socius-client.php'),
                ],
                'config'
            );
        }
    }
}
