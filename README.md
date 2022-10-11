# Sportmonks Football Api

## Installation

Require the package via composer:

```shell
composer require fpicosm/sportmonks-football-api
```

## Configuration

Update your `.env` file adding:

```text
SPORTMONKS_TOKEN=#YOUR_API_TOKEN#
SPORTMONKS_TIMEZONE=#YOUR_TIMEZONE#
```

`SPORTMONKS_TIMEZONE` is optional. If not included, it is used the `APP_TIMEZONE` value.

### Using Laravel

1. Register the ServiceProvider in `config/app.php`, inside the `providers` section:

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
        'token' => env('SPORTMONKS_TOKEN'),
        'timezone' => env('SPORTMONKS_TIMEZONE') ?: env('APP_TIMEZONE'),
    ];
    ```

4. Add the config files in `bootstrap/app.php`, inside the `Register Config Files` section:

    ```php
    $app->configure('config_path');
    $app->configure('football-api');
    ```

5. Add the ServiceProvider in `bootstrap/app.php`, inside the `Register Service Providers` section:

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

### Include option

To include relations in response, use the `include` method. Example:

```php
FootballApi::continents()->include('countries')->all();
```

You can pass an array, or a comma separated string:

```php
FootballApi::countries()->include('leagues,continent')->all();
FootballApi::countries()->include(['leagues', 'continent'])->all();
```

If you want nested includes, use a single-dimension array:

```php
FootballApi::seasons()->include(['fixtures.stage', 'fixtures.round', 'fixtures.group'])->find($id);
```

### Pagination

To set the page number, use the `page` method:

```php
FootballApi::countries()->page(2)->all();
```

To set the page size, use the `perPage` method:

```php
FootballApi::countries()->perPage(150)->all();
```

The page size must be between `10` and `150` (default value is `100`).

## Endpoints

### Bookmakers

#### Get all bookmakers

Documentation [here](https://docs.sportmonks.com/football/endpoint-overview/bookmakers/get-all-bookmakers)

```php
FootballApi::bookmakers()->all(?$params);
```

#### Get bookmaker by id

Documentation [here](https://docs.sportmonks.com/football/endpoint-overview/bookmakers/get-bookmaker-by-id)

```php
FootballApi::bookmakers()->find($id, ?$params);
```

### Coaches

#### Get coach by id

Documentation [here](https://docs.sportmonks.com/football/endpoint-overview/coaches/get-coach-by-id)

```php
FootballApi::coaches()->find($id, ?$params);
```

### Continents

#### Get all continents

Documentation [here](https://docs.sportmonks.com/football/endpoint-overview/continents/get-all-continents)

```php
FootballApi::continents()->all(?$params);
```

#### Get continent by id

Documentation [here](https://docs.sportmonks.com/football/endpoint-overview/continents/get-continent-by-id)

```php
FootballApi::continents()->find($id, ?$params);
```

### Countries

#### Get all countries

Documentation [here](https://docs.sportmonks.com/football/endpoint-overview/countries/get-all-countries)

```php
FootballApi::countries()->all(?$params);
```

#### Get country by id

Documentation [here](https://docs.sportmonks.com/football/endpoint-overview/countries/get-country-by-id)

```php
FootballApi::countries()->find($id, ?$params);
```

#### Get leagues by country id

Documentation [here](https://docs.sportmonks.com/football/endpoint-overview/leagues/get-leagues-by-country-id)

```php
FootballApi::countries($id)->leagues(?$params);
```

#### Get players by country id

Documentation [here](https://docs.sportmonks.com/football/endpoint-overview/players/get-players-by-country-id)

```php
FootballApi::countries($id)->players(?$params);
```

#### Get teams by country id

Documentation [here](https://docs.sportmonks.com/football/endpoint-overview/teams/get-teams-by-country-id)

```php
FootballApi::countries($id)->teams(?$params);
```

### Fixtures

#### Get fixture by id

Documentation [here](https://docs.sportmonks.com/football/endpoint-overview/fixtures/get-fixture-by-id)

```php
FootballApi::fixtures()->find($id, ?$params);
```

#### Get last updated fixtures

Documentation [here](https://docs.sportmonks.com/football/endpoint-overview/fixtures/get-last-updated-fixtures)

```php
FootballApi::fixtures()->lastUpdated(?$params);
```

#### Get fixtures by date

Documentation [here](https://docs.sportmonks.com/football/endpoint-overview/fixtures/get-fixtures-by-date)

```php
FootballApi::fixtures()->byDate($date, ?$params);
```

#### Get fixtures by date range

Documentation [here](https://docs.sportmonks.com/football/endpoint-overview/fixtures/get-fixtures-by-date-range)

```php
FootballApi::fixtures()->byDateRange($startDate, $endDate, ?$params);
```

#### Get fixtures by multiple id's

Documentation [here](https://docs.sportmonks.com/football/endpoint-overview/fixtures/get-fixtures-by-multiple-ids)

```php
FootballApi::fixtures()->multiple($list, ?$params);
```

The `$list` could be an array `[1, 2]` or a comma separated string `1,2`

#### Get deleted fixtures

Documentation [here](https://docs.sportmonks.com/football/endpoint-overview/fixtures/get-fixtures-by-multiple-ids-1)

```php
FootballApi::fixtures()->deleted(?$params);
```

#### Get bookmakers by fixture id

Documentation [here](https://docs.sportmonks.com/football/endpoint-overview/bookmakers/get-all-bookmakers-by-fixture-id)

```php
FootballApi::fixtures($id)->bookmakers(?$params);
```

#### Get commentaries by fixture id

Documentation [here](https://docs.sportmonks.com/football/endpoint-overview/commentaries/commentaries-by-fixture-id)

```php
FootballApi::fixtures($id)->commentaries(?$params);
```

#### Get video highlights by fixture id

Documentation [here](https://docs.sportmonks.com/football/endpoint-overview/video-highlights/get-video-highlights-by-fixture-id)

```php
FootballApi::fixtures($id)->highlights(?$params);
```

#### Get tv stations by fixture id

Documentation [here](https://docs.sportmonks.com/football/endpoint-overview/tv-stations/get-tv-station-by-fixture-id)

```php
FootballApi::fixtures($id)->tvStations(?$params);
```

### Leagues

#### Get all leagues

Documentation [here](https://docs.sportmonks.com/football/endpoint-overview/leagues/get-all-leagues)

```php
FootballApi::leagues()->all(?$params);
```

#### Get league by id

Documentation [here](https://docs.sportmonks.com/football/endpoint-overview/leagues/get-league-by-id)

```php
FootballApi::leagues()->find($id, ?$params);
```

#### Search leagues by name

Documentation [here](https://docs.sportmonks.com/football/endpoint-overview/leagues/search-leagues-by-name)

```php
FootballApi::leagues()->search($name, ?$params);
```

### Livescores

#### Get all livescores

Documentation [here](https://docs.sportmonks.com/football/endpoint-overview/livescores/get-all-livescores)

```php
FootballApi::livescores()->all(?$params);
```

#### Get all in play livescores

Documentation [here](https://docs.sportmonks.com/football/endpoint-overview/livescores/get-all-in-play-livescores)

```php
FootballApi::livescores()->playing(?$params);
```

### Markets

#### Get all markets

Documentation [here](https://docs.sportmonks.com/football/endpoint-overview/markets/get-all-markets-1)

```php
FootballApi::markets()->all(?$params);
```

#### Get market by id

Documentation [here](https://docs.sportmonks.com/football/endpoint-overview/markets/get-market-by-id)

```php
FootballApi::markets()->find($id, ?$params);
```

#### Get all fixtures by market id

Documentation [here](https://docs.sportmonks.com/football/endpoint-overview/markets/get-all-fixtures-by-market-id)

```php
FootballApi::markets($id)->fixtures(?$params);
```

### News

#### Get all news

Documentation [here](https://docs.sportmonks.com/football/endpoint-overview/news-api/get-all-news)

```php
FootballApi::news()->all(?$params);
```

#### Get news for upcoming fixtures

Documentation [here](https://docs.sportmonks.com/football/endpoint-overview/news-api/get-news-for-upcoming-fixtures)

```php
FootballApi::news()->upcoming(?$params);
```

### Players

#### Get player by id

Documentation [here](https://docs.sportmonks.com/football/endpoint-overview/players/get-player-by-id)

```php
FootballApi::players()->find($id, ?$params);
```

#### Search players by name

Documentation [here](https://docs.sportmonks.com/football/endpoint-overview/players/search-player-by-name)

```php
FootballApi::players()->search($name, ?$params);
```

### Rounds

#### Get round by id

Documentation [here](https://docs.sportmonks.com/football/endpoint-overview/rounds/get-round-by-id)

```php
FootballApi::rounds()->find($id, ?$params);
```

#### Get standings by season id and round id

Documentation [here](https://docs.sportmonks.com/football/endpoint-overview/standings/get-standings-by-season-id-and-round-id)

```php
FootballApi::rounds($id)->standings($seasonId, ?$params);
```

### Seasons

#### Get all seasons

Documentation [here](https://docs.sportmonks.com/football/endpoint-overview/seasons/get-all-seasons)

```php
FootballApi::seasons()->all(?$params);
```

#### Get season by id

Documentation [here](https://docs.sportmonks.com/football/endpoint-overview/seasons/get-season-by-id)

```php
FootballApi::seasons()->find($id, ?$params);
```

#### Get news by season id

Documentation [here](https://docs.sportmonks.com/football/endpoint-overview/news-api/get-news-by-season-id)

```php
FootballApi::seasons($id)->news(?$params);
```

#### Get rounds by season id

Documentation [here](https://docs.sportmonks.com/football/endpoint-overview/rounds/get-rounds-by-season-id)

```php
FootballApi::seasons($id)->rounds(?$params);
```

#### Get team squad by team and season id

Documentation [here](https://docs.sportmonks.com/football/endpoint-overview/team-squads/get-team-squad-by-team-and-season-id)

```php
FootballApi::seasons($id)->squad($teamId, ?$params);
```

#### Get stages by season id

Documentation [here](https://docs.sportmonks.com/football/endpoint-overview/stages/get-stages-by-season-id)

```php
FootballApi::seasons($id)->stages(?$params);
```

#### Get standings by season id

Documentation [here](https://docs.sportmonks.com/football/endpoint-overview/standings/get-standings-by-season-id)

```php
FootballApi::seasons($id)->standings(false, ?$params);
```

#### Get live standings

Documentation [here](https://docs.sportmonks.com/football/endpoint-overview/standings/get-live-standings)

```php
FootballApi::seasons($id)->standings(true, ?$params);
```

#### Get standings by season and date

Documentation [here](https://docs.sportmonks.com/football/endpoint-overview/standings/get-standings-by-season-and-date-time)

```php
FootballApi::seasons($id)->standingsByDate($date, ?$params);
```

#### Get standings corrections by season id

Documentation [here](https://docs.sportmonks.com/football/endpoint-overview/standings/get-standings-corrections-by-season-id)

```php
FootballApi::seasons($id)->standingsCorrection(?$params);
```

#### Get teams by season id

Documentation [here](https://docs.sportmonks.com/football/endpoint-overview/teams/get-teams-by-season-id)

```php
FootballApi::seasons($id)->teams(?$params);
```

#### Get topscorers by season id

Documentation [here](https://docs.sportmonks.com/football/endpoint-overview/topscorers/get-topscorers-by-season-id)

```php
FootballApi::seasons($id)->topscorers(false, ?$params);
```

#### Get topscorers aggregated by season id

Documentation [here](https://docs.sportmonks.com/football/endpoint-overview/topscorers/get-topscorers-aggregated-by-season-id)

```php
FootballApi::seasons($id)->topscorers(true, ?$params);
```

#### Get venues by season id

Documentation [here](https://docs.sportmonks.com/football/endpoint-overview/venues/get-venues-by-season-id)

```php
FootballApi::seasons($id)->venues(?$params);
```

### Stages

#### Get stage by id

Documentation [here](https://docs.sportmonks.com/football/endpoint-overview/stages/get-stage-by-id)

```php
FootballApi::stages()->find($id, ?$params);
```

### Teams

#### Get team by id

Documentation [here](https://docs.sportmonks.com/football/endpoint-overview/teams/get-team-by-id)

```php
FootballApi::teams()->find($id, ?$params);
```

#### Search teams by name

Documentation [here](https://docs.sportmonks.com/football/endpoint-overview/teams/search-team-by-name)

```php
FootballApi::teams()->search($name, ?$params);
```

#### Get all leagues by team id

Documentation [here](https://docs.sportmonks.com/football/endpoint-overview/teams/get-all-leagues-by-team-id)

```php
FootballApi::teams($id)->leagues(true, ?$params);
```

#### Get current leagues by team id

Documentation [here](https://docs.sportmonks.com/football/endpoint-overview/teams/get-current-leagues-by-team-id)

```php
FootballApi::teams($id)->leagues(false, ?$params);
```

#### Get fixtures by date range for team

Documentation [here](https://docs.sportmonks.com/football/endpoint-overview/fixtures/get-fixtures-by-date-range-for-team)

```php
FootballApi::teams($id)->fixturesByDateRange($startDate, $endDate, ?$params);
```

#### Get head 2 head by team id's

Documentation [here](https://docs.sportmonks.com/football/endpoint-overview/head2head/get-head2head-by-fixture-id)

```php
FootballApi::teams($id)->headToHead($rivalId, ?$params);
```

#### Get rivals by team id

Documentation [here](https://docs.sportmonks.com/football/endpoint-overview/rivals/get-rivals-by-team-id)

```php
FootballApi::teams($id)->rivals(?$params);
```

#### Get team squad by team and season id

Documentation [here](https://docs.sportmonks.com/football/endpoint-overview/team-squads/get-team-squad-by-team-and-season-id)

```php
FootballApi::teams($id)->squad($seasonId, ?$params);
```

### Venues

#### Get venue by id

Documentation [here](https://docs.sportmonks.com/football/endpoint-overview/venues/get-venue-by-id)

```php
FootballApi::venues()->find($id, ?$params);
```
