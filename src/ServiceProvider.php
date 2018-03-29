<?php

namespace FidelAPI;

use GuzzleHttp\Client;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/fidel-api.php', 'fidel-api'
        );
    }

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/fidel-api.php' => config_path('fidel-api.php'),
        ]);

        $this->app->bind(FidelAPI::class, function () {
            return new FidelAPI(
                config('fidel-api.token'),
                Client::class
            );
        });
    }
}
