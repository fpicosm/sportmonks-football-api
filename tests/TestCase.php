<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Config;
use Sportmonks\FootballApi\FootballApiServiceProvider;

class TestCase extends Illuminate\Foundation\Testing\TestCase
{
    /**
     * Setup the test environment.
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setup();
        Config::set('football-api.api_token', 'YOUR_API_TOKEN');
    }

    /**
     * Creates the application.
     *
     * @return Application
     */
    public function createApplication(): Application
    {
        $app = require __DIR__ . '/../vendor/laravel/laravel/bootstrap/app.php';
        $app->register(FootballApiServiceProvider::class);
        $app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();
        return $app;
    }
}
