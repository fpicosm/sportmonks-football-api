<?php

namespace Sportmonks\FootballApi;

use Illuminate\Support\ServiceProvider;

class FootballApiServiceProvider extends ServiceProvider
{
    public function boot () : void
    {
        $configPath = __DIR__ . '/config';

        $this->mergeConfigFrom($configPath . '/football-api.php', 'football-api');

        $this->publishes([
            $configPath . '/football-api.php' => config_path('football-api.php'),
        ], 'config');
    }

    public function register () : void
    {
        $this->app->singleton('football-api', function () {
            return new FootballApi();
        });
    }

}
