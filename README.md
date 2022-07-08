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
- @todo @wip: `teams` `coaches` `venues` `players` `referees` 

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

#### Get leagues by country [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/leagues/get-leagues-by-country-id)

```php
FootballApi::leagues()->byCountry($id);
FootballApi::countries($id)->leagues(); // alias
```

#### Get players by country [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/players/get-players-by-country-id)

```php
FootballApi::players()->byCountry($id);
FootballApi::countries($id)->players(); // alias
```

#### Get teams by country [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/teams/get-team-by-country-id)

```php
FootballApi::teams()->byCountry($id);
FootballApi::countries($id)->teams(); // alias
```

#### Get coaches by country [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/coaches/get-coaches-by-country-id)

```php
FootballApi::coaches()->byCountry($id);
FootballApi::countries($id)->coaches(); // alias
```

#### Get referees by country [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/referees/get-referees-by-country-id)

```php
FootballApi::referees()->byCountry($id);
FootballApi::countries($id)->referees(); // alias
```

### Regions

Include options: **[`country`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/v/core/entities/core#countries)** **[`cities`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/v/core/entities/core#cities)**

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

Include options: **[`region`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/v/core/entities/core#regions)** 
  - @todo @wip (404): `country` `coaches` `players` `venues` `referees`

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

Include options: `sport` **[`country`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/v/core/entities/core#countries)** **[`seasons`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/leagues-seasons-schedules-stages-and-rounds#season)** **[`stages`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/leagues-seasons-schedules-stages-and-rounds#stages)**

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
FootballApi::countries($id)->leagues(); // alias
```

#### Search leagues by name [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/leagues/get-leagues-search-by-name)

```php
FootballApi::leagues()->search($name);
```

#### Get transfers by league [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/seasons/get-seasons-by-id)

```php
FootballApi::transfers()->byLeague($id);
FootballApi::leagues($id)->transfers(); // alias
```

### Seasons

Include options: `sport` **[`league`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/leagues-seasons-schedules-stages-and-rounds#leagues)** **[`stages`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/leagues-seasons-schedules-stages-and-rounds#stages)** **[`fixtures`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/fixture)**
  - @todo @wip (404): `rounds` `players`
  - @todo @wip (500): `teams`

#### Get all seasons [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/seasons/get-all-seasons)

```php
FootballApi::seasons()->all();
```

#### Get season by id [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/seasons/get-seasons-by-id)

```php
FootballApi::seasons()->byId($id);
```

#### Get rounds by season [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/rounds/get-rounds-by-season-id)

```php
FootballApi::rounds()->bySeason($id);
FootballApi::seasons($id)->rounds(); // alias
```

#### Get stages by season [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/stages/get-stages-by-season-id)

```php
FootballApi::stages()->bySeason($id);
FootballApi::seasons($id)->stages(); // alias
```

#### Get teams by season [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/teams/get-team-by-season-id)

```php
FootballApi::teams()->bySeason($id);
FootballApi::seasons($id)->teams(); // alias
```

#### Get squads by team and season [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/team-squads/get-team-squads-by-team-id)

```php
FootballApi::teamSquads()->byTeamAndSeason($teamId, $seasonId)
FootballApi::seasons($id)->teamSquad($teamId); // alias
```

#### Get venues by season [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/venues/get-venues-by-season-id)

```php
FootballApi::venues()->bySeason($id);
FootballApi::seasons($id)->venues(); // alias
```

#### Get standings by season [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/standings/get-standings-by-season-id)

```php
FootballApi::standings()->bySeason($id);
FootballApi::seasons($id)->standings(); // alias
```

#### Get standing corrections by season [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/standings/get-standing-correction-by-season-id)

```php
FootballApi::standings()->correctionsBySeason($id);
FootballApi::seasons($id)->standingCorrections(); // alias
```

#### Get schedules by season [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/schedules/get-schedules-by-season-id)

```php
FootballApi::schedules()->bySeason($id);
FootballApi::seasons($id)->schedules(); // alias
```

#### Get schedules by season and team [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/schedules/get-schedules-by-season-id-and-team-id)

```php
FootballApi::schedules()->bySeasonAndTeam($seasonId, $teamId);
FootballApi::seasons($id)->teamSchedules($teamId); // alias
```

#### Get top scorers by season [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/topscorers/get-topscorers-by-season-id)

```php
FootballApi::topScorers()->bySeason($id);
FootballApi::seasons($id)->topScorers(); // alias
```

#### Get aggregated top scorers by season [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/topscorers/get-aggregated-topscorers-by-season-id)

```php
FootballApi::topScorers()->aggregatedBySeason($id);
FootballApi::seasons($id)->aggregatedTopScorers(); // alias
```

### Teams

Include options: `sport` **[`country`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/v/core/entities/core#countries)** **[`venue`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/other#venues)** **[`seasons`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/leagues-seasons-schedules-stages-and-rounds#season)** **[`players`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/teams-players-squads-coaches-and-referees#players)** **[`coaches`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/teams-players-squads-coaches-and-referees#coaches)** **[`rivals`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/teams-players-squads-coaches-and-referees#teams)**
  - @todo @wip (404): `stats`

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
FootballApi::countries($id)->teams(); // alias
```

#### Get teams by season [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/teams/get-team-by-season-id)

```php
FootballApi::teams()->bySeason($id);
FootballApi::seasons($id)->teams(); // alias
```

#### Search teams by name [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/teams/search-team-by-name)

```php
FootballApi::teams()->search($name);
```

#### Get all the leagues for a team [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/teams/get-team-all-leagues-by-id)

```php
FootballApi::teams($id)->leagues();
```

#### Get current leagues for a team [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/teams/get-team-current-leagues-by-id)

```php
FootballApi::teams($id)->currentLeagues();
```

#### Get current squad for a team [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/team-squads/get-team-squads-by-team-id)

```php
FootballApi::teamSquads()->byTeam($id);
FootballApi::teams($id)->squad(); // alias
```

#### Get squad by team and season [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/team-squads/get-team-squads-by-team-id)

```php
FootballApi::teamSquads()->byTeamAndSeason($teamId, $seasonId);
FootballApi::teams($id)->squadBySeason($seasonId); // alias
```

#### Get fixtures for a team between a date range [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/fixtures/get-fixture-by-date-range-for-team)

```php
FootballApi::fixtures()->byDateRangeForTeam($teamId, $start, $end);
FootballApi::teams($id)->fixturesByDateRange($start, $end); // alias
```

#### Get fixtures for a team against another team [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/fixtures/get-fixture-by-head-to-head)

```php
FootballApi::fixtures()->headToHead($firstTeamId, $secondTeamId);
FootballApi::teams($id)->headToHead($rivalId); // alias
```

#### Get transfers by team [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/transfers/get-transfers-by-team-id)

```php
FootballApi::transfers()->byTeam($id);
FootballApi::teams($id)->transfers(); // alias
```

#### Get schedules for one team in one season [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/schedules/get-schedules-by-season-id-and-team-id)

```php
FootballApi::schedules()->bySeasonAndTeam($seasonId, $teamId);
FootballApi::teams($id)->seasonSchedule($seasonId); // alias
```

#### Get rivals by team [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/rivals/get-rivals-by-team-id)

```php
FootballApi::rivals()->byTeam($id);
FootballApi::teams($id)->rivals(); // alias
```

### Rivals

Include options: @todo not available

#### Get all rivals [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/rivals/get-all-rivals)

```php
FootballApi::rivals()->all();
```

#### Get rivals by team [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/rivals/get-rivals-by-team-id)

```php
FootballApi::rivals()->byTeam($id);
FootballApi::teams($id)->rivals(); // alias
```

### Coaches

Include options: `sport` **[`player`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/teams-players-squads-coaches-and-referees#players)** **[`nationality`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/v/core/entities/core#countries)** **[`teams`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/teams-players-squads-coaches-and-referees#teams)**
- @todo @wip (404): `country` `city` `stats` `trophies`

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
FootballApi::countries($id)->coaches(); // alias
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

Include options: **[`country`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/v/core/entities/core#countries)** **[`city`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/v/core/entities/core#cities)** **[`fixtures`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/fixture)**

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
FootballApi::seasons($id)->venues(); // alias
```

#### Search venues by name [Docs]()

```php
FootballApi::venues()->search($name);
```

### Players

Include options: `sport` **[`country`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/v/core/entities/core#countries)** **[`nationality`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/v/core/entities/core#countries)** **[`city`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/v/core/entities/core#cities)** `position`  `detailedPosition`  **[`type`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/v/core/entities/core#types)** **[`teams`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/teams-players-squads-coaches-and-referees#teams)** **[`transfers`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/other#transfers)** **[`pendingTransfers`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/other#transfers)** `lineups`
  - @todo @wip (404): `aliases` `statistics` `events` `relatedEvents` `coach` `metadata` `trophies`

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
FootballApi::countries($id)->players(); // alias
```

#### Search players by name [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/players/get-players-by-search-by-name)

```php
FootballApi::players()->search($name);
```

#### Get last updated players [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/players/get-last-updated-players)

```php
FootballApi::players()->lastUpdated();
```

#### Get transfers by player [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/transfers/get-transfers-by-player-id)

```php
FootballApi::transfers()->byPlayer($id);
FootballApi::players($id)->transfers(); // alias
```

### Transfers

Include options: `sport` **[`player`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/teams-players-squads-coaches-and-referees#players)** **[`type`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/v/core/entities/core#types)** **[`fromLeague`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/leagues-seasons-schedules-stages-and-rounds#leagues)** **[`fromTeam`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/teams-players-squads-coaches-and-referees#teams)** **[`toLeague`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/leagues-seasons-schedules-stages-and-rounds#leagues)** **[`toTeam`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/teams-players-squads-coaches-and-referees#teams)** `position` `detailedPosition` 

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
FootballApi::teams($id)->transfers(); // alias
```

#### Get transfers by player [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/transfers/get-transfers-by-player-id)

```php
FootballApi::transfers()->byPlayer($id);
FootballApi::players($id)->transfers(); // alias
```

#### Get transfers by league [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/transfers/get-transfers-by-league-id)

```php
FootballApi::transfers()->byLeague($id);
FootballApi::leagues($id)->transfers(); // alias
```

### Squads

Include options: **[`transfer`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/other#transfers)** **[`player`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/teams-players-squads-coaches-and-referees#players)** **[`team`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/teams-players-squads-coaches-and-referees#teams)** `position`  `detailedPosition` 

#### Get current squad by team [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/team-squads/get-team-squads-by-team-id)

```php
FootballApi::squads()->byTeam($id);
FootballApi::teams($id)->squad(); // alias
```

#### Get squad by team and season [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/team-squads/get-team-squads-by-team-id)

```php
FootballApi::squads()->byTeamAndSeason($teamId, $seasonId);
FootballApi::seasons($id)->teamSquad($teamId); // alias
FootballApi::teams($id)->seasonSquad($seasonId); // alias
```

### TopScorers

@todo confirm, empty array
Include options: **[`league`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/leagues-seasons-schedules-stages-and-rounds#leagues)** **[`season`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/leagues-seasons-schedules-stages-and-rounds#season)** **[`stage`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/leagues-seasons-schedules-stages-and-rounds#stages)** **[`player`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/teams-players-squads-coaches-and-referees#players)** **[`team`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/teams-players-squads-coaches-and-referees#teams)** **[`type`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/v/core/entities/core#types)**

#### Get top scorers by season [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/topscorers/get-topscorers-by-season-id)

```php
FootballApi::topScorers()->bySeason($id);
FootballApi::seasons($id)->topScorers(); // alias
```

#### Get aggregated top scorers by season [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/topscorers/get-aggregated-topscorers-by-season-id)

```php
FootballApi::topScorers()->aggregatedBySeason($id);
FootballApi::seasons($id)->aggregatedTopScorers(); // alias
```

### Stages

Include options: `sport` **[`league`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/leagues-seasons-schedules-stages-and-rounds#leagues)** **[`season`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/leagues-seasons-schedules-stages-and-rounds#season)** **[`type`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/v/core/entities/core#types)** **[`rounds`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/leagues-seasons-schedules-stages-and-rounds#rounds)** **[`fixtures`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/fixture)**

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
FootballApi::seasons($id)->stages(); // alias
```

### Rounds 

Include options: `sport` **[`league`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/leagues-seasons-schedules-stages-and-rounds#leagues)** **[`season`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/leagues-seasons-schedules-stages-and-rounds#season)** **[`stage`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/leagues-seasons-schedules-stages-and-rounds#stages)** **[`fixtures`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/fixture)**

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
FootballApi::seasons($id)->rounds(); // alias
```

#### Get standings by round [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/standings/get-standings-by-round-id)

```php
FootballApi::standings()->byRound($id);
FootballApi::rounds($id)->standings(); // alias
```

### Fixtures

Include options: `sport` **[`league`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/leagues-seasons-schedules-stages-and-rounds#leagues)** **[`season`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/leagues-seasons-schedules-stages-and-rounds#season)** **[`stage`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/leagues-seasons-schedules-stages-and-rounds#stages)** `group` `aggregate` **[`round`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/leagues-seasons-schedules-stages-and-rounds#rounds)** **[`state`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/other#states)** **[`venue`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/other#venues)** **[`participants`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/teams-players-squads-coaches-and-referees#teams)** `lineups` `events` **[`referees`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/teams-players-squads-coaches-and-referees#referees)** **[`coaches`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/teams-players-squads-coaches-and-referees#coaches)** `statistics` `periods` `metadata` `tvStations`
  - @todo @wip (404): `commentaries`


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
FootballApi::teams($id)->fixturesByDateRange($start, $end); // alias
```

#### Get all fixtures between two teams [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/fixtures/get-fixture-by-head-to-head)

```php
FootballApi::fixtures()->headToHead($firstTeamId, $secondTeamId);
FootballApi::teams($id)->headToHead($rivalId); // alias
```

#### Get the last updated fixtures [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/fixtures/get-last-updated-fixtures)

```php
FootballApi::fixtures()->lastUpdated();
```

#### Get tv stations by fixture [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/tv-stations/get-tv-station-by-fixture-id)

```php
FootballApi::tvStations()->byFixture($id);
FootballApi::fixtures($id)->tvStations(); // alias
```

#### Get commentaries by fixture [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/commentaries/get-commentaries-by-fixture-id)

```php
FootballApi::commentaries()->byFixture($id);
FootballApi::fixtures($id)->commentaries(); // alias
```

#### Get highlights by fixture [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/video-highlights/get-video-highlights-by-fixture-id)

```php
FootballApi::highlights()->byFixture($id);
FootballApi::fixtures($id)->highlights(); // alias
```

#### Get predictions by fixture [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/predictions/get-probabilities-by-fixture-id)

```php
FootballApi::predictions()->byFixture($id);
FootballApi::fixtures($id)->predictions(); // alias
```

### Referees

Include options: `sport` **[`country`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/v/core/entities/core#countries)** **[`nationality`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/v/core/entities/core#countries)** **[`city`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/v/core/entities/core#cities)** **[`fixtures`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/fixture)** `statistics`

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
FootballApi::countries($id)->referees(); // alias
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

Include options: `sport` **[`participant`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/teams-players-squads-coaches-and-referees#teams)** **[`league`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/leagues-seasons-schedules-stages-and-rounds#leagues)** **[`season`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/leagues-seasons-schedules-stages-and-rounds#season)** **[`stage`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/leagues-seasons-schedules-stages-and-rounds#stages)** `group` **[`round`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/leagues-seasons-schedules-stages-and-rounds#rounds)** `rule`

#### Get all standings [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/standings/get-all-standings)

```php
FootballApi::standings()->all();
```

#### Get standings by season [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/standings/get-standings-by-season-id)

```php
FootballApi::standings()->bySeason($id);
FootballApi::seasons($id)->standings(); // alias
```

#### Get standings by round [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/standings/get-standings-by-round-id)

```php
FootballApi::standings()->byRound($id);
FootballApi::rounds($id)->standings(); // alias
```

#### Get standings corrections by season [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/standings/get-standing-correction-by-season-id)

```php
FootballApi::standings()->correctionsBySeason($id);
FootballApi::seasons($id)->standingCorrections(); // alias
```

### Schedules

Include options: `sport` **[`league`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/leagues-seasons-schedules-stages-and-rounds#leagues)** **[`season`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/leagues-seasons-schedules-stages-and-rounds#season)** **[`type`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/v/core/entities/core#types)**

#### Get schedules by season [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/schedules/get-schedules-by-season-id)

```php
FootballApi::schedules()->bySeason($id);
FootballApi::seasons($id)->schedules(); // alias
```

#### Get schedules by season and team [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/schedules/get-schedules-by-season-id-and-team-id)

```php
FootballApi::schedules()->bySeasonAndTeam($seasonId, $teamId);
FootballApi::seasons($id)->teamSchedules($teamId); // alias
FootballApi::teams($id)->seasonSchedules($seasonId); // alias
```

### TvStations

- Include options:
  - **[`fixture`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/fixture)**

#### Get tv stations by fixture [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/tv-stations/get-tv-station-by-fixture-id)

```php
FootballApi::tvStations()->byFixture($id);
FootballApi::fixtures($id)->tvStations(); // alias
```

### LiveScores

- Include options: `sport` **[`league`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/leagues-seasons-schedules-stages-and-rounds#leagues)** **[`season`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/leagues-seasons-schedules-stages-and-rounds#season)** **[`stage`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/leagues-seasons-schedules-stages-and-rounds#stages)** `group` `aggregate` **[`round`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/leagues-seasons-schedules-stages-and-rounds#rounds)** **[`state`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/other#states)** **[`venue`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/other#venues)** **[`participants`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/teams-players-squads-coaches-and-referees#teams)** `lineups` `events`  **[`referees`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/teams-players-squads-coaches-and-referees#referees)** **[`coaches`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/teams-players-squads-coaches-and-referees#coaches)** `statistics` `periods` `metadata` `tvStations`
  - @todo @wip (404): `commentaries`
  
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

Include options: **[`fixture`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/fixture)** **[`player`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/teams-players-squads-coaches-and-referees#players)** **[`relatedPlayer`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/teams-players-squads-coaches-and-referees#players)**

#### Get all commentaries [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/commentaries/get-all-commentaries)

```php
FootballApi::commentaries()->all();
```

#### Get commentaries by fixture [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/commentaries/get-commentaries-by-fixture-id)

```php
FootballApi::commentaries()->byFixture($id);
FootballApi::fixtures($id)->commentaries(); // alias
```

### Highlights

- Include options:
  - **[`fixture`](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/entities/fixture)**

#### Get highlights by fixture [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/video-highlights/get-video-highlights-by-fixture-id)

```php
FootballApi::highlights()->byFixture($id);
FootballApi::fixtures($id)->highlights(); // alias
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
FootballApi::fixtures($id)->predictions(); // alias
```

### States

Include options: none

#### Get all states [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/states/get-all-states)

```php
FootballApi::states()->all();
```

#### Get state by id [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/states/get-state-by-id)

```php
FootballApi::states()->byId($id);
```

### Types

Include options: none

#### Get all types [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/v/core/endpoints/types/get-all-types)

```php
FootballApi::types()->all();
```

#### Get type by id [Docs](https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/v/core/endpoints/types/get-type-by-id)

```php
FootballApi::types()->byId($id);
```
