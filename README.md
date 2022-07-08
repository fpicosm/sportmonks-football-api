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

Include options: **[`countries`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/v/core/entities/core#countries)**

#### Get all continents [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/v/core/endpoints/continents/get-all-continents)

```php
FootballApi::continents()->all();
```

#### Get continent by id [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/v/core/endpoints/continents/get-continent-by-id)

```php
FootballApi::continents()->byId(1);
```

### Countries

Include options: **[`continent`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/v/core/entities/core#continents)** **[`regions`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/v/core/entities/core#regions)** **[`leagues`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/leagues-seasons-schedules-stages-and-rounds#leagues)**
  - `teams` @todo @wip
  - `coaches` @todo @wip
  - `venues` @todo @wip
  - `players` @todo @wip
  - `referees` @todo @wip

#### Get all countries [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/v/core/endpoints/countries/get-all-countries)

```php
FootballApi::countries()->all();
```

#### Get country by id [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/v/core/endpoints/countries/get-country-by-id)

```php
FootballApi::countries()->byId($id);
```

#### Search countries by name [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/v/core/endpoints/countries/get-country-by-search)

```php
FootballApi::countries()->search($name);
```

#### Get the country leagues [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/leagues/get-leagues-by-country-id)

```php
FootballApi::countries($id)->leagues();
FootballApi::leagues()->byCountry($id);
```

#### Get the country players [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/players/get-players-by-country-id)

```php
FootballApi::countries($id)->players();
FootballApi::players()->byCountry($id);
```

#### Get the country teams [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/teams/get-team-by-country-id)

```php
FootballApi::countries($id)->teams();
FootballApi::teams()->byCountry($id);
```

#### Get the country coaches [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/coaches/get-coaches-by-country-id)

```php
FootballApi::countries($id)->coaches();
FootballApi::coaches()->byCountry($id);
```

#### Get the country referees [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/referees/get-referees-by-country-id)

```php
FootballApi::countries($id)->referees();
FootballApi::referees()->byCountry($id);
```

### Regions

Include options: 
  - **[`country`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/v/core/entities/core#countries)**
  - **[`cities`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/v/core/entities/core#cities)**

#### Get all regions [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/v/core/endpoints/regions/get-all-regions)

```php
FootballApi::regions()->all();
```

#### Get region by id [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/v/core/endpoints/regions/get-region-by-id)

```php
FootballApi::regions()->byId($id);
```

#### Search regions by name [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/v/core/endpoints/regions/get-region-by-search)

```php
FootballApi::regions()->search($name);
```

### Cities

Include options: 
  - **[`region`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/v/core/entities/core#regions)**
  - `country` @todo @wip
  - `coaches` @todo @wip
  - `players` @todo @wip
  - `venues` @todo @wip
  - `referees` @todo @wip

#### Get all cities [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/v/core/endpoints/cities/get-all-cities)

```php
FootballApi::cities()->all();
```

#### Get city by id [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/v/core/endpoints/cities/get-cities-by-id)

```php
FootballApi::cities()->byId($id);
```

#### Search city by name [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/v/core/endpoints/cities/get-cities-by-search)

```php
FootballApi::cities()->search($name);
```

### Leagues

Include options: 
  - `sport`
  - **[`country`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/v/core/entities/core#countries)**
  - **[`seasons`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/leagues-seasons-schedules-stages-and-rounds#season)**
  - **[`stages`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/leagues-seasons-schedules-stages-and-rounds#stages)**

#### Get all leagues [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/leagues/get-all-leagues)

```php
FootballApi::leagues()->all();
```

#### Get league by id [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/leagues/get-league-by-id)

```php
FootballApi::leagues()->byId($id);
```

#### Get live leagues [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/leagues/get-leagues-by-live)

```php
FootballApi::leagues()->live();
```

#### Get leagues by date [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/leagues/get-leagues-by-fixture-date)

```php
FootballApi::leagues()->byDate($date);
```

#### Get leagues by country [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/leagues/get-leagues-by-country-id)

```php
FootballApi::leagues()->byCountry($id);
FootballApi::countries($id)->leagues();
```

#### Search leagues by name [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/leagues/get-leagues-search-by-name)

```php
FootballApi::leagues()->search($name);
```

#### Get the league transfers [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/seasons/get-seasons-by-id)

```php
FootballApi::leagues($id)->transfers();
FootballApi::transfers()->byLeague($id);
```

### Seasons

Include options: 
  - `sport` 
  - **[`league`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/leagues-seasons-schedules-stages-and-rounds#leagues)**
  - **[`stages`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/leagues-seasons-schedules-stages-and-rounds#stages)**
  - **[`fixtures`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/fixture)**
  - `rounds` @todo @wip
  - `teams` @todo @wip (error 500)
  - `players` @todo @wip

#### Get all seasons [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/seasons/get-all-seasons)

```php
FootballApi::seasons()->all();
```

#### Get season by id [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/seasons/get-seasons-by-id)

```php
FootballApi::seasons()->byId($id);
```

#### Get the season rounds [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/rounds/get-rounds-by-season-id)

```php
FootballApi::seasons($id)->rounds();
FootballApi::rounds()->bySeason($id);
```

#### Get the season stages [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/stages/get-stages-by-season-id)

```php
FootballApi::seasons($id)->stages();
FootballApi::stages()->bySeason($id);
```

#### Get the season teams [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/teams/get-team-by-season-id)

```php
FootballApi::seasons($id)->teams();
FootballApi::teams()->bySeason($id);
```

#### Get the team squad in one season [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/team-squads/get-team-squads-by-team-id)

```php
FootballApi::seasons($id)->teamSquad($teamId);
FootballApi::teamSquads()->byTeamAndSeason($teamId, $seasonId)
```

#### Get the season venues [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/venues/get-venues-by-season-id)

```php
FootballApi::seasons($id)->venues();
```

#### Get the season standings [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/standings/get-standings-by-season-id)

```php
FootballApi::seasons($id)->standings();
FootballApi::standings()->bySeason($id);
```

#### Get the season standings corrections [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/standings/get-standing-correction-by-season-id)

```php
FootballApi::seasons($id)->standingCorrections();
FootballApi::standings()->correctionsBySeason($id);
```

#### Get the season schedules [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/schedules/get-schedules-by-season-id)

```php
FootballApi::seasons($id)->schedules();
FootballApi::schedules()->bySeason($id);
```

#### Get the team schedules in one season [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/schedules/get-schedules-by-season-id-and-team-id)

```php
FootballApi::seasons($id)->teamSchedules($teamId);
FootballApi::schedules()->bySeasonAndTeam($seasonId, $teamId);
```

#### Get the season top scorers [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/topscorers/get-topscorers-by-season-id)

```php
FootballApi::seasons($id)->topScorers();
FootballApi::topScorers()->bySeason($id);
```

#### Get the season aggregated top scorers [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/topscorers/get-aggregated-topscorers-by-season-id)

```php
FootballApi::seasons($id)->aggregatedTopScorers();
FootballApi::topScorers()->aggregatedBySeason($id);
```

### Teams

Include options: 
  - `sport` 
  - **[`country`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/v/core/entities/core#countries)**
  - **[`venue`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/other#venues)** 
  - **[`seasons`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/leagues-seasons-schedules-stages-and-rounds#season)**
  - **[`players`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/teams-players-squads-coaches-and-referees#players)**
  - **[`coaches`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/teams-players-squads-coaches-and-referees#coaches)**
  - **[`rivals`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/teams-players-squads-coaches-and-referees#teams)**
  - `stats` @todo @wip 404

#### Get all teams [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/teams/get-all-teams)

```php
FootballApi::teams()->all();
```

#### Get team by id [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/teams/get-team-by-id)

```php
FootballApi::teams()->byId($id);
```

#### Get teams by country [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/teams/get-team-by-id)

```php
FootballApi::teams()->byCountry($id);
FootballApi::countries($id)->teams();
```

#### Get teams by season [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/teams/get-team-by-season-id)

```php
FootballApi::teams()->bySeason($id);
FootballApi::seasons($id)->teams();
```

#### Search teams by name [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/teams/search-team-by-name)

```php
FootballApi::teams()->search($name);
```

#### Get all the historical leagues for a team [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/teams/get-team-all-leagues-by-id)

```php
FootballApi::teams($id)->leagues();
```

#### Get the current leagues for a team [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/teams/get-team-current-leagues-by-id)

```php
FootballApi::teams($id)->currentLeagues();
```

#### Get the current team squad [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/team-squads/get-team-squads-by-team-id)

```php
FootballApi::teams($id)->squad();
FootballApi::teamSquads()->byTeam($id);
```

#### Get the team squad for a season [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/team-squads/get-team-squads-by-team-id)

```php
FootballApi::teams($id)->squadBySeason($seasonId);
FootballApi::teamSquads()->byTeamAndSeason($teamId, $seasonId);
```

#### Get the team fixtures between a date range [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/fixtures/get-fixture-by-date-range-for-team)

```php
FootballApi::teams($id)->fixturesByDateRange($start, $end);
FootballApi::fixtures()->byDateRangeForTeam($teamId, $start, $end);
```

#### Get the team fixtures against another team [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/fixtures/get-fixture-by-head-to-head)

```php
FootballApi::teams($id)->headToHead($rivalId);
FootballApi::fixtures()->headToHead($firstTeamId, $secondTeamId);
```

#### Get the team transfers [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/transfers/get-transfers-by-team-id)

```php
FootballApi::teams($id)->transfers();
FootballApi::transfers()->byTeam($id);
```

#### Get the team schedules for a season [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/schedules/get-schedules-by-season-id-and-team-id)

```php
FootballApi::teams($id)->seasonSchedule($seasonId);
FootballApi::schedules()->bySeasonAndTeam($seasonId, $teamId);
```

#### Get the team rivals [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/rivals/get-rivals-by-team-id)

```php
FootballApi::teams($id)->rivals();
FootballApi::rivals()->byTeam($id);
```

### Rivals

#### Get all rivals [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/rivals/get-all-rivals)

```php
FootballApi::rivals()->all();
```

#### Get rivals by team [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/rivals/get-rivals-by-team-id)

```php
FootballApi::rivals()->byTeam($id);
FootballApi::teams($id)->rivals();
```

### Coaches

Include options: 
- `sport`
- **[`player`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/teams-players-squads-coaches-and-referees#players)**
- `country` @todo @wip 404
- **[`nationality`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/v/core/entities/core#countries)**
- `city` @todo @wip 404
- **[`teams`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/teams-players-squads-coaches-and-referees#teams)**
- `stats` @todo @wip 404
- `trophies` @todo @wip 404

#### Get all coaches [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/coaches/get-all-coaches)

```php
FootballApi::coaches()->all();
```

#### Get coach by id [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/coaches/get-coaches-by-id)

```php
FootballApi::coaches()->byId($id);
```

#### Get coaches by country [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/coaches/get-coaches-by-country-id)

```php
FootballApi::coaches()->byCountry($id);
FootballApi::countries($id)->coaches();
```

#### Search coaches by name [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/coaches/get-coaches-by-search-by-name)

```php
FootballApi::coaches()->search($name);
```

#### Get last updated coaches [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/coaches/get-last-updated-coaches)

```php
FootballApi::coaches()->lastUpdated();
```

### Venues

Include options: 
  - **[`country`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/v/core/entities/core#countries)**
  - **[`city`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/v/core/entities/core#cities)**
  - **[`fixtures`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/fixture)**

#### Get all venues [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/venues/get-all-venues)

```php
FootballApi::venues()->all();
```

#### Get venue by id [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/venues/get-venue-by-id)

```php
FootballApi::venues()->byId($id);
```

#### Get venues by season [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/venues/get-venues-by-season-id)

```php
FootballApi::venues()->bySeason($id);
FootballApi::seasons($id)->venues();
```

#### Search venues by name [Docs]()

```php
FootballApi::venues()->search($name);
```

### Players

Include options: 
  - `sport`
  - **[`country`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/v/core/entities/core#countries)**
  - **[`nationality`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/v/core/entities/core#countries)**
  - **[`city`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/v/core/entities/core#cities)**
  - `position` 
  - `detailedPosition` 
  - **[`type`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/v/core/entities/core#types)**
  - **[`teams`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/teams-players-squads-coaches-and-referees#teams)**
  - **[`transfers`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/other#transfers)**
  - **[`pendingTransfers`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/other#transfers)**
  - `aliases` @todo @wip 404
  - `statistics` @todo @wip 404
  - `lineups` 
  - `events` @todo @wip 404
  - `relatedEvents` @todo @wip 404
  - `coach` @todo @wip 404
  - `metadata` @todo @wip 404
  - `trophies` @todo @wip 404

#### Get all players [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/players/get-all-players)

```php
FootballApi::players()->all();
```

#### Get player by id [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/players/get-players-by-id)

```php
FootballApi::players()->byId($id);
```

#### Get players by country [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/players/get-players-by-country-id)

```php
FootballApi::players()->byCountry($id);
FootballApi::countries($id)->players();
```

#### Search players by name [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/players/get-players-by-search-by-name)

```php
FootballApi::players()->search($name);
```

#### Get last updated players [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/players/get-last-updated-players)

```php
FootballApi::players()->lastUpdated();
```

#### Get the player transfers [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/transfers/get-transfers-by-player-id)

```php
FootballApi::players($id)->transfers();
FootballApi::transfers()->byPlayer($id);
```

### Transfers

Include options:
  - `sport`
  - **[`player`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/teams-players-squads-coaches-and-referees#players)**
  - **[`type`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/v/core/entities/core#types)**
  - **[`fromLeague`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/leagues-seasons-schedules-stages-and-rounds#leagues)**
  - **[`fromTeam`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/teams-players-squads-coaches-and-referees#teams)**
  - **[`toLeague`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/leagues-seasons-schedules-stages-and-rounds#leagues)**
  - **[`toTeam`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/teams-players-squads-coaches-and-referees#teams)**
  - `position` 
  - `detailedPosition` 

#### Get all transfers [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/transfers/get-all-transfers)

```php
FootballApi::transfers()->all();
```

#### Get transfer by id [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/transfers/get-transfers-by-id)

```php
FootballApi::transfers()->byId($id);
```

#### Get the latest transfers [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/transfers/get-latest-transfers)

```php
FootballApi::transfers()->latest();
```

#### Get transfers by team [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/transfers/get-transfers-by-team-id)

```php
FootballApi::transfers()->byTeam($id);
FootballApi::teams($id)->transfers();
```

#### Get transfers by player [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/transfers/get-transfers-by-player-id)

```php
FootballApi::transfers()->byPlayer($id);
FootballApi::players($id)->transfers();
```

#### Get transfers by league [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/transfers/get-transfers-by-league-id)

```php
FootballApi::transfers()->byLeague($id);
FootballApi::leagues($id)->transfers();
```

### Squads

Include options:
  - **[`transfer`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/other#transfers)**
  - **[`player`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/teams-players-squads-coaches-and-referees#players)**
  - **[`team`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/teams-players-squads-coaches-and-referees#teams)**
  - `position` 
  - `detailedPosition` 

#### Get current squad by team [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/team-squads/get-team-squads-by-team-id)

```php
FootballApi::squads()->byTeam($id);
FootballApi::teams($id)->squad();
```

#### Get historical squad by team and season [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/team-squads/get-team-squads-by-team-id)

```php
FootballApi::squads()->byTeamAndSeason($teamId, $seasonId);
FootballApi::seasons($id)->teamSquad($teamId);
FootballApi::teams($id)->seasonSquad($seasonId);
```

### TopScorers

Include options: @todo

#### Get top scorers by season [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/topscorers/get-topscorers-by-season-id)

```php
FootballApi::topScorers()->bySeason($id);
FootballApi::seasons($id)->topScorers();
```

#### Get aggregated top scorers by season [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/topscorers/get-aggregated-topscorers-by-season-id)

```php
FootballApi::topScorers()->aggregatedBySeason($id);
FootballApi::seasons($id)->aggregatedTopScorers();
```

### Stages

Include options:
  - `sport`
  - **[`league`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/leagues-seasons-schedules-stages-and-rounds#leagues)**
  - **[`season`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/leagues-seasons-schedules-stages-and-rounds#season)**
  - **[`type`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/v/core/entities/core#types)**
  - **[`rounds`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/leagues-seasons-schedules-stages-and-rounds#rounds)**
  - **[`fixtures`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/fixture)**

#### Get all stages [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/stages/get-all-stages)

```php
FootballApi::stages()->all();
```

#### Get stage by id [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/stages/get-stages-by-id)

```php
FootballApi::stages()->byId($id);
```

#### Get stages by season [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/stages/get-stages-by-season-id)

```php
FootballApi::stages()->bySeason($id);
FootballApi::seasons($id)->stages();
```

### Rounds 

Include options:
  - `sport`
  - **[`league`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/leagues-seasons-schedules-stages-and-rounds#leagues)**
  - **[`season`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/leagues-seasons-schedules-stages-and-rounds#season)**
  - **[`stage`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/leagues-seasons-schedules-stages-and-rounds#stages)**
  - **[`fixtures`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/fixture)**

#### Get all rounds [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/rounds/get-all-rounds)

```php
FootballApi::rounds()->all();
```

#### Get round by id [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/rounds/get-rounds-by-id)

```php
FootballApi::rounds()->by();
```

#### Get rounds by seasons [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/rounds/get-rounds-by-season-id)

```php
FootballApi::rounds()->bySeason($id);
FootballApi::seasons($id)->rounds();
```

#### Get the round standings [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/standings/get-standings-by-round-id)

```php
FootballApi::rounds($id)->standings();
FootballApi::standings()->byRound($id);
```

### Fixtures

Include options: `sport` **[`league`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/leagues-seasons-schedules-stages-and-rounds#leagues)** **[`season`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/leagues-seasons-schedules-stages-and-rounds#season)** **[`stage`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/leagues-seasons-schedules-stages-and-rounds#stages)** `group` `aggregate` **[`round`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/leagues-seasons-schedules-stages-and-rounds#rounds)** **[`state`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/other#states)** **[`venue`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/other#venues)** **[`participants`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/teams-players-squads-coaches-and-referees#teams)** `lineups` `events` **[`referees`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/teams-players-squads-coaches-and-referees#referees)** **[`coaches`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/teams-players-squads-coaches-and-referees#coaches)** `statistics` `periods` `metadata` `tvStations`
  - `commentaries` @todo @wip 404


#### Get all fixtures [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/fixtures/get-all-fixtures)

```php
FootballApi::fixtures()->all();
```

#### Get fixture by id [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/fixtures/get-fixture-by-id)

```php
FootballApi::fixtures()->byId($id);
```

#### Get multiple fixtures by ids [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/fixtures/get-fixtures-by-multiple-ids)

```php
FootballApi::fixtures()->byIds($ids);
```

#### Get the fixtures between two dates [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/fixtures/get-fixture-by-date-range)

```php
FootballApi::fixtures()->byDateRange($start, $end);
```

#### Get the fixtures by date [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/fixtures/get-fixtures-by-date)

```php
FootballApi::fixtures()->byDate($date);
```

#### Get the fixtures for a team between two dates [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/fixtures/get-fixture-by-date-range-for-team)

```php
FootballApi::fixtures()->byDateRangeForTeam($teamId, $start, $end);
FootballApi::teams($id)->fixturesByDateRange($start, $end);
```

#### Get all fixtures between two teams [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/fixtures/get-fixture-by-head-to-head)

```php
FootballApi::fixtures()->headToHead($firstTeamId, $secondTeamId);
FootballApi::teams($id)->headToHead($rivalId);
```

#### Get the last updated fixtures [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/fixtures/get-last-updated-fixtures)

```php
FootballApi::fixtures()->lastUpdated();
```

#### Get the fixture TV stations [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/tv-stations/get-tv-station-by-fixture-id)

```php
FootballApi::fixtures($id)->tvStations();
FootballApi::tvStations()->byFixture($id);
```

#### Get the fixture commentaries [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/commentaries/get-commentaries-by-fixture-id)

```php
FootballApi::fixtures($id)->commentaries();
FootballApi::commentaries()->byFixture($id);
```

#### Get the fixture highlights [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/video-highlights/get-video-highlights-by-fixture-id)

```php
FootballApi::fixtures($id)->highlights();
FootballApi::highlights()->byFixture($id);
```

#### Get the fixture predictions [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/predictions/get-probabilities-by-fixture-id)

```php
FootballApi::fixtures($id)->predictions();
FootballApi::predictions()->byFixture($id);
```

### Referees

Include options:
  - `sport`
  - **[`country`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/v/core/entities/core#countries)**
  - **[`nationality`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/v/core/entities/core#countries)**
  - **[`city`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/v/core/entities/core#cities)**
  - **[`fixtures`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/fixture)**
  - `statistics`

#### Get all referees [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/referees/get-all-referees)

```php
FootballApi::referees()->all();
```

#### Get referee by id [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/referees/get-referees-by-id)

```php
FootballApi::referees()->byId($id);
```

#### Get referees by country [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/referees/get-referees-by-country-id)

```php
FootballApi::referees()->byCountry($id);
FootballApi::countries($id)->referees();
```

#### Search referees by name [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/referees/get-referees-by-search-by-name)

```php
FootballApi::referees()->search($name);
```

#### Get last updated referees [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/referees/get-last-updated-referees)

```php
FootballApi::referees()->lastUpdated();
```

### Standings

Include options:
  - `sport`
  - **[`participant`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/teams-players-squads-coaches-and-referees#teams)**
  - **[`league`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/leagues-seasons-schedules-stages-and-rounds#leagues)**
  - **[`season`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/leagues-seasons-schedules-stages-and-rounds#season)**
  - **[`stage`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/leagues-seasons-schedules-stages-and-rounds#stages)**
  - `group`
  - **[`round`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/leagues-seasons-schedules-stages-and-rounds#rounds)**
  - `rule`

#### Get all standings [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/standings/get-all-standings)

```php
FootballApi::standings()->all();
```

#### Get standings by season [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/standings/get-standings-by-season-id)

```php
FootballApi::standings()->bySeason($id);
FootballApi::seasons($id)->standings();
```

#### Get standings by round [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/standings/get-standings-by-round-id)

```php
FootballApi::standings()->byRound($id);
FootballApi::rounds($id)->standings();
```

#### Get standings corrections by season [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/standings/get-standing-correction-by-season-id)

```php
FootballApi::standings()->correctionsBySeason($id);
FootballApi::seasons($id)->standingCorrections();
```

### Schedules

Include options:
  - `sport`
  - **[`league`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/leagues-seasons-schedules-stages-and-rounds#leagues)**
  - **[`season`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/leagues-seasons-schedules-stages-and-rounds#season)**
  - **[`type`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/v/core/entities/core#types)**

#### Get schedules by season [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/schedules/get-schedules-by-season-id)

```php
FootballApi::schedules()->bySeason($id);
FootballApi::seasons($id)->schedules();
```

#### Get schedules by season and team [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/schedules/get-schedules-by-season-id-and-team-id)

```php
FootballApi::schedules()->bySeasonAndTeam($seasonId, $teamId);
FootballApi::seasons($id)->teamSchedules($teamId);
FootballApi::teams($id)->seasonSchedules($seasonId);
```

### TvStations

- Include options:
  - **[`fixture`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/fixture)**

#### Get tv stations by fixture [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/tv-stations/get-tv-station-by-fixture-id)

```php
FootballApi::tvStations()->byFixture($id);
FootballApi::fixtures($id)->tvStations();
```

### LiveScores

- Include options: 
  - `sport`
  - **[`league`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/leagues-seasons-schedules-stages-and-rounds#leagues)**
  - **[`season`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/leagues-seasons-schedules-stages-and-rounds#season)**
  - **[`stage`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/leagues-seasons-schedules-stages-and-rounds#stages)**
  - `group`
  - `aggregate`
  - **[`round`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/leagues-seasons-schedules-stages-and-rounds#rounds)**
  - **[`state`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/other#states)**
  - **[`venue`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/other#venues)**
  - **[`participants`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/teams-players-squads-coaches-and-referees#teams)**
  - `lineups`
  - `events` 
  - **[`referees`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/teams-players-squads-coaches-and-referees#referees)**
  - **[`coaches`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/teams-players-squads-coaches-and-referees#coaches)**
  - `commentaries` @todo @wip 404
  - `statistics` 
  - `periods` 
  - `metadata`
  - `tvStations`
  
#### Get all the fixtures of today [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/livescores/get-all-livescores)

```php
FootballApi::livescores()->all();
```

#### Get all live* fixtures [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/livescores/get-inplay-livescores)

<sup><sub>* fixtures will be available 15 minutes before the match has started and 15 mins after it has ended</sub></sup>

```php
FootballApi::livescores()->inplay();
```

### Commentaries

- Include options:
  - **[`fixture`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/fixture)**
  - **[`player`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/teams-players-squads-coaches-and-referees#players)**
  - **[`relatedPlayer`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/teams-players-squads-coaches-and-referees#players)**

#### Get all commentaries [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/commentaries/get-all-commentaries)

```php
FootballApi::commentaries()->all();
```

#### Get commentaries by fixture [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/commentaries/get-commentaries-by-fixture-id)

```php
FootballApi::commentaries()->byFixture($id);
FootballApi::fixtures($id)->commentaries();
```

### Highlights

- Include options:
  - **[`fixture`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/fixture)**

#### Get highlights by fixture [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/video-highlights/get-video-highlights-by-fixture-id)

```php
FootballApi::highlights()->byFixture($id);
FootballApi::fixtures($id)->highlights();
```

### Predictions

@todo @wip

#### Get all* the probabilities [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/predictions/get-probabilities)

<sup><sub>* All probabilities are available 21 days before the match starts</sub></sup>

```php
FootballApi::predictions()->probabilities();
```

#### Get predictions by fixture [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/predictions/get-probabilities-by-fixture-id)

```php
FootballApi::predictions()->byFixture($id);
FootballApi::fixtures($id)->predictions();
```

### States

- Include option: none

#### Get all states [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/states/get-all-states)

```php
FootballApi::states()->all();
```

#### Get state by id [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/states/get-state-by-id)

```php
FootballApi::states()->byId($id);
```

### Types

- Include option: none

#### Get all types [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/v/core/endpoints/types/get-all-types)

```php
FootballApi::types()->all();
```

#### Get type by id [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/v/core/endpoints/types/get-type-by-id)

```php
FootballApi::types()->byId($id);
```
