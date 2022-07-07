<?php

namespace Sportmonks\FootballApi\Providers;

use Illuminate\Support\ServiceProvider as ServiceProviderAlias;
use Sportmonks\FootballApi\FootballApi;

class ServiceProvider extends ServiceProviderAlias
{
    /**
     * Boot the application's service providers.
     *
     * @return void
     */
    public function boot(): void
    {
        $configPath = __DIR__ . '/../../../config';

        $this->mergeConfigFrom($configPath . '/football-api.php', 'football-api');

        $this->publishes([
            $configPath . '/football-api.php' => config_path('football-api.php'),
        ], 'config');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->singleton('football-api', function () {
            return new FootballApi();
        });
    }
}
