<?php

namespace Grixu\SociusClient;

use Illuminate\Support\ServiceProvider;

class SociusClientServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'socius-client');

        $this->app->singleton('socius-client', function () {
            return new SociusClient();
        });
    }

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
