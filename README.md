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

### Select option

If you want to select only specific fields, use the `select` method. You can pass an array, or a comma separated string. Examples:

```php
FootballApi::countries()->select('name,official_name')->all();
FootballApi::countries()->select(['name', 'official_name'])->all();
```

### Include option

To include relations in response, use the `include` method. Example:

```php
FootballApi::continents()->include('countries')->all();
```

You can pass an array, or a semicolon separated string:

```php
FootballApi::countries()->include('leagues;continent')->all();
FootballApi::countries()->include(['leagues', 'continent'])->all();
```

You can combine include and select options. Example: 

```php
FootballApi::continents()->include('countries:name,official_name')->select('name')->all();
```

For more info, check the syntax api [Documentation](https://docs.sportmonks.com/football/api/syntax).

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

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/bookmakers/get-all-bookmakers)

```php
FootballApi::bookmakers()->all();
```

#### Get bookmaker by id

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/bookmakers/get-bookmaker-by-id)

```php
/**
 * @param int $id the bookmaker id
 */
FootballApi::bookmakers()->byId($id);
```

#### Search bookmakers by name

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/bookmakers/get-bookmakers-by-search-by-name)

```php
/**
 * @param string $name the bookmaker name
 */
FootballApi::bookmakers()->search($name);
```

#### Get bookmakers by fixture id

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/bookmakers/get-bookmaker-by-fixture-id)

```php
/**
 * @param int $id the fixture id
 */
FootballApi::bookmakers()->byFixtureId($id);
```

### Cities

#### Get all cities

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/cities/get-all-cities)

```php
FootballApi::cities()->all();
```

#### Get city by id

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/cities/get-city-by-id)

```php
/**
 * @param int $id the city id
 */
FootballApi::cities()->byId($id);
```

#### Search cities by name

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/cities/get-cities-by-search)

```php
/**
 * @param string $name the city name
 */
FootballApi::cities()->search($name);
```

### Coaches

#### Get all coaches

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/coaches/get-all-coaches)

```php
FootballApi::coaches()->all();
```

#### Get coach by id

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/coaches/get-coach-by-id)

```php
/**
 * @param int $id the coach id
 */
FootballApi::coaches()->byId($id);
```

#### Get coaches by country id

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/coaches/get-coaches-by-country-id)

```php
/**
 * @param int $id the country id
 */
FootballApi::coaches()->byCountryId($id);
```

#### Search coaches by name

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/coaches/get-coaches-by-search-by-name)

```php
/**
 * @param string $name the coach name
 */
FootballApi::coaches()->search($name);
```

#### Get last updated coaches

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/coaches/get-last-updated-coaches)

```php
FootballApi::coaches()->latest();
```

### Commentaries

#### Get all commentaries

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/commentaries/get-all-commentaries)

```php
FootballApi::commentaries()->all();
```

#### Get commentaries by fixture id

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/commentaries/get-commentaries-by-fixture-id)

```php
/**
 * @param int $id the fixture id
 */
FootballApi::commentaries()->byFixtureId($id);
```

### Continents

#### Get all continents

[Documentation](https://docs.sportmonks.com/football/v/core-api/endpoints/continents/get-all-continents)

```php
FootballApi::continents()->all();
```

#### Get continent by id

[Documentation](https://docs.sportmonks.com/football/v/core-api/endpoints/continents/get-continent-by-id)

```php
/**
 * @param int $id the continent id
 */
FootballApi::continents()->byId($id);
```

### Countries

#### Get all countries

[Documentation](https://docs.sportmonks.com/football/v/core-api/endpoints/countries/get-all-countries)

```php
FootballApi::countries()->all();
```

#### Get country by id

[Documentation](https://docs.sportmonks.com/football/v/core-api/endpoints/countries/get-country-by-id)

```php
/**
 * @param int $id the country id
 */
FootballApi::countries()->byId($id);
```

#### Search countries by name

[Documentation](https://docs.sportmonks.com/football/v/core-api/endpoints/countries/get-countries-by-search)

```php
/**
 * @param string $id the country name
 */
FootballApi::countries()->search($name);
```

#### Get leagues by country id

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/leagues/get-leagues-by-country-id)

```php
/**
 * @param int $id the country id
 */
FootballApi::countries($id)->leagues();
```

#### Get players by country id

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/players/get-players-by-country-id)

```php
/**
 * @param int $id the country id
 */
FootballApi::countries($id)->players();
```

#### Get teams by country id

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/teams/get-teams-by-country-id)

```php
/**
 * @param int $id the country id
 */
FootballApi::countries($id)->teams();
```

#### Get coaches by country id

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/coaches/get-coaches-by-country-id)

```php
/**
 * @param int $id the country id
 */
FootballApi::countries($id)->coaches();
```

#### Get referees by country id

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/referees/get-referees-by-country-id)

```php
/**
 * @param int $id the country id
 */
FootballApi::countries($id)->referees();
```

### Enrichments

#### Get all enrichments

[Documentation](https://docs.sportmonks.com/football/v/core-api/endpoints/my-sportmonks/get-my-enrichments)

```php
FootballApi::enrichments()->all();
```

### Filters

#### Get all filters

[Documentation](https://docs.sportmonks.com/football/v/core-api/endpoints/filters/get-all-entity-filters)

```php
FootballApi::filters()->all();
```

### Fixtures

#### Get all fixtures

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/fixtures/get-all-fixtures)

```php
FootballApi::fixtures()->all();
```

#### Get fixture by id

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/fixtures/get-fixture-by-id)

```php
/**
 * @param int $id the fixture id
 */
FootballApi::fixtures()->byId($id);
```

#### Get fixtures by multiple ids

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/fixtures/get-fixtures-by-multiple-ids)

```php
/**
 * @param string|array $ids the fixture list. could be an array or a comma separated string.
 */
$fixtures = [1, 2, 3, 4, 5];
FootballApi::fixtures()->byIds($fixtures);
FootballApi::fixtures()->byIds('1,2,3,4,5');
```

#### Get fixtures by date

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/fixtures/get-fixtures-by-date)

```php
/**
 * @param string $date YYYY-MM-DD
 */
FootballApi::fixtures()->byDate($date);
```

#### Get fixtures by date range

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/fixtures/get-fixtures-by-date-range)

```php
/**
 * @param string $from YYYY-MM-DD
 * @param string $to   YYYY-MM-DD
 */
FootballApi::fixtures()->byDateRange($from, $to);
```

#### Get fixtures by date range for team

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/fixtures/get-fixtures-by-date-range-for-team)

```php
/**
 * @param string $from YYYY-MM-DD
 * @param string $to   YYYY-MM-DD
 * @param int    $id   the team id
 */
FootballApi::fixtures()->byDateRangeForTeam($from, $to, $id);
```

#### Get fixtures by head-to-head

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/fixtures/get-fixtures-by-head-to-head)

```php
/**
 * @param int $firstId  the team id
 * @param int $secondId the team id
 */
FootballApi::fixtures()->headToHead($firstId, $secondId);
```

#### Search fixtures by name

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/fixtures/get-fixtures-by-search-by-name)

```php
/**
 * @param string $name the team name
 */
FootballApi::fixtures()->search($name);
```

#### Get upcoming fixtures by market id

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/fixtures/get-upcoming-fixtures-by-market-id)

```php
/**
 * @param int $id the market id
 */
FootballApi::fixtures()->upcomingByMarketId($id);
```

#### Get last updated fixtures

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/fixtures/get-latest-updated-fixtures)

```php
FootballApi::fixtures()->latest();
```

#### Get tv stations by fixture id

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/tv-stations/get-tv-stations-by-fixture-id)

```php
/**
 * @param int $id the fixture id
 */
FootballApi::fixtures($id)->tvStations();
```

#### Get predictions by fixture id

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/predictions/get-probabilities-by-fixture-id)

```php
/**
 * @param int $id the fixture id
 */
FootballApi::fixtures($id)->predictions();
```

#### Get bookmakers by fixture id

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/bookmakers/get-bookmaker-by-fixture-id)

```php
/**
 * @param int $id the fixture id
 */
FootballApi::fixtures($id)->bookmakers();
```

#### Get commentaries by fixture id

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/commentaries/get-commentaries-by-fixture-id)

```php
/**
 * @param int $id the fixture id
 */
FootballApi::fixtures($id)->commentaries();
```

### Leagues

#### Get all leagues

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/leagues/get-all-leagues)

```php
FootballApi::leagues()->all();
```

#### Get league by id

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/leagues/get-league-by-id)

```php
/**
 * @param int $id the league id
 */
FootballApi::leagues()->byId($id);
```

#### Get all live leagues

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/leagues/get-leagues-by-live)

```php
FootballApi::leagues()->live();
```

#### Get leagues by fixture date

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/leagues/get-leagues-by-fixture-date)

```php
/**
 * @param string $date YYYY-MM-DD
 */
FootballApi::leagues()->byFixtureDate($date);
```

#### Get leagues by country id

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/leagues/get-leagues-by-country-id)

```php
/**
 * @param int $id the country id
 */
FootballApi::leagues()->byCountryId($id);
```

#### Search leagues by name

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/leagues/get-leagues-search-by-name)

```php
/**
 * @param string $name the league name
 */
FootballApi::leagues()->search($name);
```

#### Get all leagues by team id

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/leagues/get-all-leagues-by-team-id)

```php
/**
 * @param int $id the team id
 */
FootballApi::leagues()->allByTeamId($id);
```

#### Get current leagues by team id

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/leagues/get-current-leagues-by-team-id)

```php
/**
 * @param int $id the team id
 */
FootballApi::leagues()->currentByTeamId($id);
```

#### Get live standings by league id

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/standings/get-live-standings-by-league-id)

```php
/**
 * @param int $id the league id
 */
FootballApi::leagues($id)->liveStandings();
```

#### Get predictions by league id

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/predictions/get-predictability-by-league-id)

```php
/**
 * @param int $id the league id
 */
FootballApi::leagues($id)->predictions();
```

### Livescores

#### Get inplay livescores

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/livescores/get-inplay-livescores)

```php
FootballApi::livescores()->inplay();
```

#### Get all livescores

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/livescores/get-all-livescores)

```php
FootballApi::livescores()->all();
```

#### Get last updated livescores

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/livescores/get-latest-updated-livescores)

```php
FootballApi::livescores()->latest();
```

### Markets

#### Get all markets

[Documentation](https://docs.sportmonks.com/football/v/odds-api/getting-started/endpoints/markets/get-all-markets)

```php
FootballApi::markets()->all();
```

#### Get market by id

[Documentation](https://docs.sportmonks.com/football/v/odds-api/getting-started/endpoints/markets/get-market-by-id)

```php
/**
 * @param int $id the market id
 */
FootballApi::markets()->byId($id);
```

#### Search markets by name

[Documentation](https://docs.sportmonks.com/football/v/odds-api/getting-started/endpoints/markets/get-markets-by-search-by-name)

```php
/**
 * @param string $name the market name
 */
FootballApi::markets()->search($name);
```

### News

#### Get all pre-match news

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/news/get-pre-match-news)

```php
FootballApi::news()->all();
```

#### Get pre-match news by season id

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/news/get-pre-match-news-by-season-id)

```php
/**
 * @param int $id the season id
 */
FootballApi::news()->bySeasonId($id);
```

#### Get pre-match news for upcoming fixtures

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/news/get-pre-match-news-for-upcoming-fixtures)

```php
FootballApi::news()->upcoming();
```

### Players

#### Get all players

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/players/get-all-players)

```php
FootballApi::players()->all();
```

#### Get player by id

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/players/get-player-by-id)

```php
/**
 * @param int $id the player id
 */
FootballApi::players()->byId($id);
```

#### Get players by country id

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/players/get-players-by-country-id)

```php
/**
 * @param int $id the country id
 */
FootballApi::players()->byCountryId($id);
```

#### Search players by name

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/players/get-players-by-search-by-name)

```php
/**
 * @param string $name the player name
 */
FootballApi::players()->search($name);
```

#### Get last updated players

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/players/get-last-updated-players)

```php
FootballApi::players()->latest();
```

#### Get transfers by player id

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/transfers/get-transfers-by-player-id)

```php
/**
 * @param int $id the player id
 */
FootballApi::players($id)->transfers();
```

### Predictions

#### Get all probabilities

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/predictions/get-probabilities)

```php
FootballApi::predictions()->probabilities();
```

#### Get predictability by league id

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/predictions/get-predictability-by-league-id)

```php
/**
 * @param int $id the league id
 */
FootballApi::predictions()->byLeagueId($id);
```

#### Get probabilities by fixture id

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/predictions/get-probabilities-by-fixture-id)

```php
/**
 * @param int $id the fixture id
 */
FootballApi::predictions()->byFixtureId($id);
```

#### Get all value bets

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/predictions/get-value-bets)

```php
FootballApi::predictions()->valueBets();
```

### Referees

#### Get all referees

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/referees/get-all-referees)

```php
FootballApi::referees()->all();
```

#### Get referee by id

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/referees/get-referee-by-id)

```php
/**
 * @param int $id the referee id
 */
FootballApi::referees()->byId($id);
```

#### Get referees by country id

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/referees/get-referees-by-country-id)

```php
/**
 * @param int $id the country id
 */
FootballApi::referees()->byCountryId($id);
```

#### Search referees by name

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/referees/get-referees-by-search-by-name)

```php
/**
 * @param string $name the referee name
 */
FootballApi::referees()->search($name);
```

#### Get last updated referees

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/referees/get-last-updated-referees)

```php
FootballApi::referees()->latest();
```

### Regions

#### Get all regions

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/regions/get-all-regions)

```php
FootballApi::regions()->all();
```

#### Get region by id

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/regions/get-region-by-id)

```php
/**
 * @param int $id the region id
 */
FootballApi::regions()->byId($id);
```

#### Search regions by name

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/regions/get-regions-by-search)

```php
/**
 * @param string $name the region name
 */
FootballApi::regions()->search($name);
```

### Resources

#### Get all resources

[Documentation](https://docs.sportmonks.com/football/v/core-api/endpoints/my-sportmonks/get-my-resources)

```php
FootballApi::resources()->all();
```

### Rivals

#### Get all rivals

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/rivals/get-all-rivals)

```php
FootballApi::rivals()->all();
```

#### Get rivals by team id

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/rivals/get-rivals-by-team-id)

```php
/**
 * @param int $id the team id
 */
FootballApi::rivals()->byTeamId($id);
```

### Rounds

#### Get all rounds 

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/rounds/get-all-rounds)

```php
FootballApi::rounds()->all();
```

#### Get round by id 

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/rounds/get-round-by-id)

```php
/**
 * @param int $id
 */
FootballApi::rounds()->byId($id);
```

#### Get rounds by season id 

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/rounds/get-rounds-by-season-id)

```php
/**
 * @param int $id the season id
 */
FootballApi::rounds()->bySeasonId($id);
```

#### Search rounds by name 

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/rounds/get-rounds-by-search-by-name)

```php
/**
 * @param string $id the round name
 */
FootballApi::rounds()->search($name);
```

#### Get standings by round id

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/standings/get-standings-by-round-id)

```php
/**
 * @param int $id the round id
 */
FootballApi::rounds($id)->standings();
```

### Schedules

#### Get schedules by season id

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/schedules/get-schedules-by-season-id)

```php
/**
 * @param int $id the season id
 */
FootballApi::schedules()->bySeasonId($id);
```

#### Get schedules by team id

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/schedules/get-schedules-by-team-id)

```php
/**
 * @param int $id the team id
 */
FootballApi::schedules()->byTeamId($id);
```

#### Get schedules by season and team id

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/schedules/get-schedules-by-season-id-and-team-id)

```php
/**
 * @param int $seasonId the season id
 * @param int $teamId   the team id
 */
FootballApi::schedules()->bySeasonAndTeamId($seasonId, $teamId);
```

### Seasons

#### Get all seasons

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/seasons/get-all-seasons)

```php
FootballApi::seasons()->all();
```

#### Get season by id

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/seasons/get-season-by-id)

```php
/**
 * @param int $id the season id
 */
FootballApi::seasons()->byId($id);
```

#### Get seasons by team id

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/seasons/get-seasons-by-team-id)

```php
/**
 * @param int $id the team id
 */
FootballApi::seasons()->byTeamId($id);
```

#### Search seasons by name

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/seasons/get-seasons-by-search-by-name)

```php
/**
 * @param string $name the season name
 */
FootballApi::seasons()->search($name);
```

#### Get schedules by season id

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/schedules/get-schedules-by-season-id)

```php
/**
 * @param int $id the season id
 */
FootballApi::seasons($id)->schedules();
```

#### Get schedules by season and team id

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/schedules/get-schedules-by-season-id)

```php
/**
 * @param int $seasonId the season id
 * @param int $teamId   the team id
 */
FootballApi::seasons($seasonId)->schedulesByTeamId($teamId);
```

#### Get stages by season id

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/stages/get-stages-by-season-id)

```php
/**
 * @param int $id the season id
 */
FootballApi::seasons($id)->stages();
```

#### Get rounds by season id

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/rounds/get-rounds-by-season-id)

```php
/**
 * @param int $id the season id
 */
FootballApi::seasons($id)->rounds();
```

#### Get standings by season id

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/standings/get-standings-by-season-id)

```php
/**
 * @param int $id the season id
 */
FootballApi::seasons($id)->standings();
```

#### Get standings correction by season id

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/standings/get-standing-correction-by-season-id)

```php
/**
 * @param int $id the season id
 */
FootballApi::seasons($id)->standingsCorrection();
```

#### Get topscorers by season id

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/topscorers/get-topscorers-by-season-id)

```php
/**
 * @param int $id the season id
 */
FootballApi::seasons($id)->topscorers();
```

#### Get teams by season id

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/teams/get-teams-by-season-id)

```php
/**
 * @param int $id the season id
 */
FootballApi::seasons($id)->teams();
```

#### Get squads by season and team id

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/team-squads/get-team-squad-by-team-and-season-id)

```php
/**
 * @param int $seasonId the season id
 * @param int $teamId   the team id
 */
FootballApi::seasons($seasonId)->squadsByTeamId($teamId);
```

#### Get venues by season id

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/venues/get-venues-by-season-id)

```php
/**
 * @param int $id the season id
 */
FootballApi::seasons($id)->venues();
```

#### Get news by season id

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/news/get-pre-match-news-by-season-id)

```php
/**
 * @param int $id the season id
 */
FootballApi::seasons($id)->news();
```

### Squads

#### Get domestic squads by team id

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/team-squads/get-team-squad-by-team-id)

```php
/**
 * @param int $id the team id
 */
FootballApi::squads()->byTeamId($id);
```

#### Get squads by team and season id

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/team-squads/get-team-squad-by-team-and-season-id)

```php
/**
 * @param int $teamId   the team id
 * @param int $seasonId the season id
 */
FootballApi::squads()->byTeamAndSeasonId($teamId, $seasonId);
```

### Stages

#### Get all stages

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/stages/get-all-stages)

```php
FootballApi::stages()->all();
```

#### Get stage by id

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/stages/get-stage-by-id)

```php
/**
 * @param int $id the stage id
 */
FootballApi::stages()->byId($id);
```

#### Get stages by season id

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/stages/get-stages-by-season-id)

```php
/**
 * @param int $id the season id
 */
FootballApi::stages()->bySeasonId($id);
```

#### Search stages by name

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/stages/get-stages-by-search-by-name)

```php
/**
 * @param string $name the stage name
 */
FootballApi::stages()->search($name);
```

#### Get topscorers by stage id

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/topscorers/get-topscorers-by-stage-id)

```php
/**
 * @param int $id the stage id
 */
FootballApi::stages($id)->topscorers();
```

### Standings

#### Get all standings

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/standings/get-all-standings)

```php
FootballApi::standings()->all();
```

#### Get standings by season id

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/standings/get-standings-by-season-id)

```php
/**
 * @param int $id the season id
 */
FootballApi::standings()->bySeasonId($id);
```

#### Get standing correction by season id

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/standings/get-standing-correction-by-season-id)

```php
/**
 * @param int $id the season id
 */
FootballApi::standings()->correctionBySeasonId($id);
```

#### Get standings by round id

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/standings/get-standings-by-round-id)

```php
/**
 * @param int $id the round id
 */
FootballApi::standings()->byRoundId($id);
```

#### Get live standings by league id

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/standings/get-live-standings-by-league-id)

```php
/**
 * @param int $id the league id
 */
FootballApi::standings()->liveByLeagueId($id);
```

### States

#### Get all states

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/states/get-all-states)

```php
FootballApi::states()->all();
```

#### Get state by id

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/states/get-state-by-id)

```php
/** 
 * @param int $id the state id
 */
FootballApi::states()->byId($id);
```

### Teams

#### Get all teams 

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/teams/get-all-teams)

```php
FootballApi::teams()->all();
```

#### Get team by id

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/teams/get-team-by-id)

```php
/**
 * @param int $id the team id
 */
FootballApi::teams()->byId($id);
```

#### Get teams by country id

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/teams/get-teams-by-country-id)

```php
/**
 * @param int $id the country id
 */
FootballApi::teams()->byCountryId($id);
```

#### Get teams by season id

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/teams/get-teams-by-season-id)

```php
/**
 * @param int $id the season id
 */
FootballApi::teams()->bySeasonId($id);
```

#### Search teams by name

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/teams/get-teams-by-search-by-name)

```php
/**
 * @param string $name the team name
 */
FootballApi::teams()->search($name);
```

#### Get fixtures by date range for team

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/fixtures/get-fixtures-by-date-range-for-team)

```php
/**
 * @param int    $teamId the team id
 * @param string $from   YYYY-MM-DD
 * @param string $to     YYYY-MM-DD
 */
FootballApi::teams($teamId)->fixturesByDateRange($from, $to);
```

#### Get fixtures by head-to-head for team

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/fixtures/get-fixtures-by-date-range-for-team)

```php
/**
 * @param int $teamId     the team id
 * @param int $opponentId the opponent id
 */
FootballApi::teams($teamId)->headToHead($opponentId);
```

#### Get all leagues by team id

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/leagues/get-all-leagues-by-team-id)

```php
/**
 * @param int $id the team id
 */
FootballApi::teams($id)->allLeagues();
```

#### Get current leagues by team id

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/leagues/get-current-leagues-by-team-id)

```php
/**
 * @param int $id the team id
 */
FootballApi::teams($id)->currentLeagues();
```

#### Get schedules by team id

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/schedules/get-schedules-by-team-id)

```php
/**
 * @param int $id the team id
 */
FootballApi::teams($id)->schedules();
```

#### Get schedules by team and season id

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/schedules/get-schedules-by-season-id-and-team-id)

```php
/**
 * @param int $teamId   the team id
 * @param int $seasonId the season id
 */
FootballApi::teams($teamId)->schedulesBySeasonId($seasonId);
```

#### Get seasons by team id

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/seasons/get-seasons-by-team-id)

```php
/**
 * @param int $id the team id
 */
FootballApi::teams($id)->seasons();
```

#### Get current domestic squads by team id

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/team-squads/get-team-squad-by-team-id)

```php
/**
 * @param int $id the team id
 */
FootballApi::teams($id)->squads();
```

#### Get squads by team and season id

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/team-squads/get-team-squad-by-team-and-season-id)

```php
/**
 * @param int $teamId   the team id
 * @param int $seasonId the season id
 */
FootballApi::teams($teamId)->squadsBySeasonId($seasonId);
```

#### Get transfers by team id

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/transfers/get-transfers-by-team-id)

```php
/**
 * @param int $id the team id
 */
FootballApi::teams($id)->transfers();
```

#### Get rivals by team id

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/rivals/get-rivals-by-team-id)

```php
/**
 * @param int $id the team id
 */
FootballApi::teams($id)->rivals();
```

### Topscorers

#### Get topscorers by season id 

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/topscorers/get-topscorers-by-season-id)

```php
/**
 * @param int $id the season id
 */
FootballApi::topscorers()->bySeasonId($id);
```

#### Get topscorers by stage id 

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/topscorers/get-topscorers-by-stage-id)

```php
/**
 * @param int $id the stage id
 */
FootballApi::topscorers()->byStageId($id);
```

### Transfers

#### Get all transfers

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/transfers/get-all-transfers)

```php
FootballApi::transfers()->all();
```

#### Get transfer by id

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/transfers/get-transfer-by-id)

```php
/** 
 * @param int $id the transfer id
 */
FootballApi::transfers()->byId($id);
```

#### Get last transfers

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/transfers/get-latest-transfers)

```php
FootballApi::transfers()->latest();
```

#### Get transfers between two dates

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/transfers/get-transfers-between-date-range)

```php
/**
 * @param string $from YYYY-MM-DD
 * @param string $to   YYYY-MM-DD
 */
FootballApi::transfers()->byDateRange($from, $to);
```

#### Get transfers by team id

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/transfers/get-transfers-by-team-id)

```php
/**
 * @param int $id the team id
 */
FootballApi::transfers()->byTeamId($id);
```

#### Get transfers by player id

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/transfers/get-transfers-by-player-id)

```php
/**
 * @param int $id the player id
 */
FootballApi::transfers()->byPlayerId($id);
```

### TvStations

#### Get all tv stations

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/tv-stations/get-all-tv-stations)

```php
FootballApi::tvStations()->all();
```

#### Get tv station by id

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/tv-stations/get-tv-station-by-id)

```php
/**
 * @param int $id the tv station id
 */
FootballApi::tvStations()->byId($id);
```

#### Get tv stations by fixture id

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/tv-stations/get-tv-stations-by-fixture-id)

```php
/**
 * @param int $id the fixture id
 */
FootballApi::tvStations()->byFixtureId($id);
```

### Types

#### Get all types

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/types/get-all-types)

```php
FootballApi::types()->all();
```

#### Get type by id

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/types/get-type-by-id)

```php
/**
 * @param int $id the type id
 */
FootballApi::types()->byId($id);
```

### Venues

#### Get all venues

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/venues/get-all-venues)

```php
FootballApi::venues()->all();
```

#### Get venue by id

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/venues/get-venue-by-id)

```php
/**
 * @param int $id the venue id
 */
FootballApi::venues()->byId($id);
```

#### Get venues by season id

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/venues/get-venues-by-season-id)

```php
/**
 * @param int $id the season id
 */
FootballApi::venues()->bySeasonId($id);
```

#### Search venues by name

[Documentation](https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/venues/get-venues-by-search-by-name)

```php
/**
 * @param string $name the venue name
 */
FootballApi::venues()->search($name);
```
