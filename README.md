# Football Api v3

## Installation

Add the dependency into your `composer.json` file:

```json
{
    "require": {
        "fpicosm/sportmonks-football-api": "^0.1"
    }
}
```

Add the url from GitHub into the `repositories` option in your `composer.json` file:

```json
{
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/fpicosm/sportmonks-football-api"
        }
    ]
}
```

Update your dependencies via `composer`:

```bash
composer update
```

## Configuration

First, you need to update your `.env` file adding:

```text
SPORTMONKS_TOKEN=YOUR_API_TOKEN
SPORTMONKS_TIMEZONE=YOUR_TIMEZONE
```

The `SPORTMONKS_TIMEZONE` is optional. If not included, the api get the value from the `APP_TIMEZONE` variable.

### Using Laravel

1. Register the ServiceProvider in `config/app.php`, in the `providers` section:

```php
Sportmonks\FootballApi\Providers\ServiceProvider::class,
```

2. Add the Facade alias in `config/app.php`, in the `aliases` section:

```php
'FootballApi' => Sportmonks\FootballApi\Facades\FootballApi::class,
```

3. Publish the config file

```bash
php artisan vendor:publish --provider="Sportmonks\FootballApi\Providers\ServiceProvider"
```

### Using Lumen

1. Create the folder `config` at the root of the project (if not exists).

2. Create the file `config/config_path.php` (if not exists) and paste:

```php
<?php

if (!function_exists('config_path')) {
    /**
     * Get the configuration path.
     *
     * @param string $path
     * @return string
     */
    function config_path($path = '')
    {
        return app()->basePath() . '/config' . ($path ? "/$path" : $path);
    }
}
```

3. Create the file `config/football-api.php` and paste:

```php
<?php

return [
    'api_token' => env('SPORTMONKS_TOKEN'),
    'api_timezone' => env('SPORTMONKS_TIMEZONE') ?: env('APP_TIMEZONE'),
];
```

4. Add the config files in `bootstrap/app.php` in the `Register Config Files` section:

```php
$app->configure('config_path');
$app->configure('football-api');
```

5. Add the ServiceProvider in `bootstrap/app.php` in the `Register Service Providers` section:

```php
$app->register(Sportmonks\FootballApi\Providers\ServiceProvider::class),
```

6. Uncomment the line `$app->withFacades();` in `bootstrap/app.php`

## Usage

You can call to `FootballApi::endpoint()->method()`:

### Continents

#### Get all continents

Returns all the continents available within your subscription:

```php
FootballApi::continents()->all();
```
