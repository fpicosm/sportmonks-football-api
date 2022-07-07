# Football Api v3

## Installation

Add the dependency into your `composer.json` file:

```json
{
    "require": {
        "fpicosm/sportmonks-football-api": "dev-main"
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
Sportmonks\FootballApi\FootballApiServiceProvider::class,
```

2. Publish the config file

```bash
php artisan vendor:publish --provider="Sportmonks\FootballApi\FootballApiServiceProvider"
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
$app->register(Sportmonks\FootballApi\FootballApiServiceProvider::class);
```

6. Uncomment the line `$app->withFacades();` in `bootstrap/app.php`

## Usage

When needed, add the dependency:

```php
use Sportmonks\FootballApi\FootballApi;
```

Then, you can call to `FootballApi::endpoint()->method($params)`:

### Select option

To select specific fields on the base entity, use the `select` method:

```php
FootballApi::continents()->select('name')->all();
```

You can pass string (comma separated)

```php
FootballApi::leagues()->select('name,type,active')->all();
```

or array of strings:

```php
FootballApi::leagues()->select(['name', 'type', 'active'])->all();
```

See the [documentation](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/request-options)
for more info.

### Include option

To include relations in response, use the `include` method:

```php
FootballApi::continents()->include('countries')->all();
```

You can pass string or array. The next both examples return the same:

```php
FootballApi::seasons()->include('fixtures;league')->all();
FootballApi::seasons()->include(['fixtures', 'league'])->all();
```

If you want nested includes, for example `?include=league;fixtures.stage;fixtures.participants` you can only pass single dimension array:

```php
FootballApi::seasons()->include(['league', 'fixtures.stage', 'fixtures.participants'])->all();
```

You can combine both options `select` and `include`:

```php
FootballApi::players()->select('name')->include('country')->all();
```

### Pagination

To set the page number, use the `page` method:

```php
FootballApi::players()->page(2)->all();
```

To set the page size, use the `perPage` method:

```php
FootballApi::players()->perPage(50)->all();
```

### Response object

The queries return an object containing the next fields:

- `data`: An _array_ or an _object_ containing the results
- `pagination`: Information about pagination, like current page, total pages, items per page, results count...
- `subscription`: Information about your plan
- `rate_limit`: Information about your rate limit. See the [documentation](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/rate-limit) for more info.

## Endpoints

### Continents

**Include options**: `countries`

#### Get all continents - [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/v/core/endpoints/continents/get-all-continents)

```php
FootballApi::continents()->all();
```

#### Get continent by id - [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/v/core/endpoints/continents/get-continent-by-id)

```php
FootballApi::continents()->byId(1);
```

### Countries

#### Get all countries - [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/v/core/endpoints/countries/get-all-countries)

```php
FootballApi::countries()->all();
```

#### Get country by id - [Docs]()

```php
```

####  - [Docs]()

```php
```

####  - [Docs]()

```php
```

####  - [Docs]()

```php
```

####  - [Docs]()

```php
```

####  - [Docs]()

```php
```

####  - [Docs]()

```php
```

####  - [Docs]()

```php
```

####  - [Docs]()

```php
```

####  - [Docs]()

```php
```

####  - [Docs]()

```php
```

####  - [Docs]()

```php
```

####  - [Docs]()

```php
```

####  - [Docs]()

```php
```

####  - [Docs]()

```php
```

####  - [Docs]()

```php
```

####  - [Docs]()

```php
```

####  - [Docs]()

```php
```

####  - [Docs]()

```php
```

####  - [Docs]()

```php
```

####  - [Docs]()

```php
```

####  - [Docs]()

```php
```

####  - [Docs]()

```php
```

####  - [Docs]()

```php
```

####  - [Docs]()

```php
```

####  - [Docs]()

```php
```

####  - [Docs]()

```php
```

####  - [Docs]()

```php
```

####  - [Docs]()

```php
```

####  - [Docs]()

```php
```
