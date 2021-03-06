<?php

namespace FidelAPI;

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

        $headers = [
            'Content-Type' => 'application/json',
            'Fidel-Key' => config('fidel-api.token'),
            'fidel-key' => config('fidel-api.token')
        ];


        $this->app->bind(FidelAPI::class, function () use ($headers) {
            return new FidelAPI(
                config('fidel-api.token'),
                new \GuzzleHttp\Client(['base_uri' => config('fidel-api.base_url'), 'headers' => $headers])
            );
        });
    }
}
