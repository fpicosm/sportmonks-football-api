<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Config;
use Sportmonks\FootballApi\FootballApiServiceProvider;

class TestCase extends \Illuminate\Foundation\Testing\TestCase
{
    public function createApplication(): Application
    {
        $app = require __DIR__ . '/../vendor/laravel/laravel/bootstrap/app.php';
        $app->register(FootballApiServiceProvider::class);
        $app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

        return $app;
    }

    protected function setUp(): void
    {
        parent::setUp();
        Config::set('football-api.token', '');
    }
}
