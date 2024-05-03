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

2. Create the file `config/football-api.php` and paste:

    ```php
    <?php
    
    if (!function_exists('config_path')) {
        function config_path($path = '')
        {
            return app()->basePath() . '/config' . ($path ? "/$path" : $path);
        }
    }

    return [
        'token' => env('SPORTMONKS_TOKEN'),
        'timezone' => env('SPORTMONKS_TIMEZONE') ?: env('APP_TIMEZONE'),
    ];
    ```

3. Add the config file in `bootstrap/app.php`, inside the `Register Config Files` section:

    ```php
    $app->configure('football-api');
    ```

4. Add the ServiceProvider in `bootstrap/app.php`, inside the `Register Service Providers` section:

    ```php
    $app->register(Sportmonks\FootballApi\FootballApiServiceProvider::class);
    ```

5. Uncomment the line `$app->withFacades();` in `bootstrap/app.php`

## Usage

Where needed, add the dependency:

```php
use Sportmonks\FootballApi\FootballApi;
```

Then, you can call to:

```php
FootballApi::endpoint()->method($params):
```

### Select option

To select only specific fields, you can pass an array, or a comma separated string.
Examples:

```php
FootballApi::countries()->select('name,official_name')->all();
FootballApi::countries()->select(['name', 'official_name'])->all();
```

### Include option

To include relations, you can pass an array, or a semicolon separated string.
Examples:

```php
FootballApi::countries()->include('continent;leagues')->all();
```

You can pass an array, or a semicolon separated string:

```php
FootballApi::countries()->include('leagues;continent')->all();
FootballApi::countries()->include(['leagues', 'continent'])->all();
```

You can combine both include and select options. Example:

```php
FootballApi::continents()->include('countries:name,official_name')->select('name')->all();
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

```php
FootballApi::bookmakers()->all();
```

#### Get all premium bookmakers

```php
FootballApi::bookmakers()->premium();
```

#### Get bookmaker by id

```php
FootballApi::bookmakers()->find($bookmakerId);
```

#### Search bookmakers by name

```php
FootballApi::bookmakers()->search($name);
```

#### Get bookmakers by fixture id

```php
FootballApi::bookmakers()->byFixture($fixtureId);
```

#### Get pre-match odds by fixture id and bookmaker id

```php
FootballApi::bookmakers($bookmakerId)->preMatchOddsByFixture($fixtureId);
```

#### Get inplay odds by fixture id and bookmaker id

```php
FootballApi::bookmakers($bookmakerId)->inplayOddsByFixture($fixtureId);
```

#### Get premium odds by fixture id and bookmaker id

```php
FootballApi::bookmakers($marketId)->premiumOddsByFixture($fixtureId);
```

### Cities

#### Get all cities

```php
FootballApi::cities()->all();
```

#### Get city by id

```php
FootballApi::cities()->find($cityId);
```

#### Search cities by name

```php
FootballApi::cities()->search($name);
```

### Coaches

#### Get all coaches

```php
FootballApi::coaches()->all();
```

#### Get coach by id

```php
FootballApi::coaches()->find($coachId);
```

#### Get coaches by country id

```php
FootballApi::coaches()->byCountry($countryId);
```

#### Search coaches by name

```php
FootballApi::coaches()->search($name);
```

#### Get last updated coaches

```php
FootballApi::coaches()->lastUpdated();
```

#### Get coach statistics by season id

```php
FootballApi::coaches()->statisticsBySeason($seasonId);
```

### Commentaries

#### Get all commentaries

```php
FootballApi::commentaries()->all();
```

#### Get commentaries by fixture id

```php
FootballApi::commentaries()->byFixture($fixtureId);
```

### Continents

#### Get all continents

```php
FootballApi::continents()->all();
```

#### Get continent by id

```php
FootballApi::continents()->find($continentId);
```

### Countries

#### Get all countries

```php
FootballApi::countries()->all();
```

#### Get country by id

```php
FootballApi::countries()->find($countryId);
```

#### Search countries by name

```php
FootballApi::countries()->search($name);
```

#### Get leagues by country id

```php
FootballApi::countries($countryId)->leagues();
```

#### Get players by country id

```php
FootballApi::countries($countryId)->players();
```

#### Get teams by country id

```php
FootballApi::countries($countryId)->teams();
```

#### Get coaches by country id

```php
FootballApi::countries($countryId)->coaches();
```

#### Get referees by country id

```php
FootballApi::countries($countryId)->referees();
```

### Enrichments

#### Get all enrichments

```php
FootballApi::enrichments()->all();
```

### Expected

#### Get expected by team

```php
FootballApi::expected()->byTeam();
```

#### Get expected by player

```php
FootballApi::expected()->byPlayer();
```

### Filters

#### Get all filters

```php
FootballApi::filters()->all();
```

### Fixtures

#### Get all fixtures

```php
FootballApi::fixtures()->all();
```

#### Get fixture by id

```php
FootballApi::fixtures()->find($fixtureId);
```

#### Get fixtures by multiple ids

```php
FootballApi::fixtures()->multiples([1, 2, 3, 4, 5]);
// or
FootballApi::fixtures()->multiples('1,2,3,4,5');
```

#### Get fixtures by date

```php
FootballApi::fixtures()->byDate($date);
```

#### Get fixtures by date range

```php
FootballApi::fixtures()->byDateRange($from, $to);
```

#### Get fixtures by date range for team

```php
FootballApi::fixtures()->byDateRangeForTeam($from, $to, $teamId);
```

#### Get fixtures by head-to-head

```php
FootballApi::fixtures()->headToHead($firstTeamId, $secondTeamId);
```

#### Search fixtures by name

```php
FootballApi::fixtures()->search($teamName);
```

#### Get upcoming fixtures by market id

```php
FootballApi::fixtures()->upcomingByMarket($marketId);
```

#### Get upcoming fixtures by tv-station id

```php
FootballApi::fixtures()->upcomingByTvStation($tvStationId);
```

#### Get past fixtures by tv-station id

```php
FootballApi::fixtures()->pastByTvStation($tvStationId);
```

#### Get last updated fixtures

```php
FootballApi::fixtures()->lastUpdated();
```

#### Get tv stations by fixture id

```php
FootballApi::fixtures($fixtureId)->tvStations();
```

#### Get predictions by fixture id

```php
FootballApi::fixtures($fixtureId)->predictions();
```

#### Get bookmakers by fixture id

```php
FootballApi::fixtures($fixtureId)->bookmakers();
```

#### Get commentaries by fixture id

```php
FootballApi::fixtures($fixtureId)->commentaries();
```

#### Get value bets by fixture id

```php
FootballApi::fixtures($fixtureId)->valueBets();
```

#### Get pre-match odds by fixture id

```php
FootballApi::fixtures($fixtureId)->preMatchOdds();
```

#### Get pre-match odds by fixture id and bookmaker id

```php
FootballApi::fixtures($fixtureId)->preMatchOddsByBookmaker($bookmakerId);
```

#### Get pre-match odds by fixture id and market id

```php
FootballApi::fixtures($fixtureId)->preMatchOddsByMarket($marketId);
```

#### Get inplay odds by fixture id

```php
FootballApi::fixtures($fixtureId)->inplayOdds();
```

#### Get inplay odds by fixture id and bookmaker id

```php
FootballApi::fixtures($fixtureId)->inplayOddsByBookmaker($bookmakerId);
```

#### Get inplay odds by fixture id and market id

```php
FootballApi::fixtures($fixtureId)->inplayOddsByMarket($marketId);
```

#### Get premium odds by fixture id

```php
FootballApi::fixtures($fixtureId)->premiumOdds();
```

#### Get premium odds by fixture id and bookmaker id

```php
FootballApi::fixtures($fixtureId)->premiumOddsByBookmaker($bookmakerId);
```

#### Get premium odds by fixture id and market id

```php
FootballApi::fixtures($fixtureId)->premiumOddsByMarket($marketId);
```

### Leagues

#### Get all leagues

```php
FootballApi::leagues()->all();
```

#### Get league by id

```php
FootballApi::leagues()->find($leagueId);
```

#### Get all live leagues

```php
FootballApi::leagues()->live();
```

#### Get leagues by fixture date

```php
FootballApi::leagues()->byFixtureDate($date);
```

#### Get leagues by country id

```php
FootballApi::leagues()->byCountry($countryId);
```

#### Search leagues by name

```php
FootballApi::leagues()->search($name);
```

#### Get all leagues by team id

```php
FootballApi::leagues()->allByTeam($teamId);
```

#### Get current leagues by team id

```php
FootballApi::leagues()->currentByTeam($teamId);
```

#### Get live standings by league id

```php
FootballApi::leagues($leagueId)->liveStandings();
```

#### Get predictions by league id

```php
FootballApi::leagues($leagueId)->predictions();
```

### Livescores

#### Get inplay livescores

```php
FootballApi::livescores()->inplay();
```

#### Get all livescores

```php
FootballApi::livescores()->all();
```

#### Get last updated livescores

```php
FootballApi::livescores()->lastUpdated();
```

### Markets

#### Get all markets

```php
FootballApi::markets()->all();
```

#### Get all premium markets

```php
FootballApi::markets()->premium();
```

#### Get market by id

```php
FootballApi::markets()->find($marketId);
```

#### Search markets by name

```php
FootballApi::markets()->search($name);
```

#### Get pre-match odds by fixture id and market id

```php
FootballApi::markets($marketId)->preMatchOddsByFixture($fixtureId);
```

#### Get inplay odds by fixture id and market id

```php
FootballApi::markets($marketId)->inplayOddsByFixture($fixtureId);
```

#### Get premium odds by fixture id and market id

```php
FootballApi::markets($marketId)->premiumOddsByFixture($fixtureId);
```

### News

#### Get all pre-match news

```php
FootballApi::news()->all();
```

#### Get pre-match news by season id

```php
FootballApi::news()->bySeason($seasonId);
```

#### Get pre-match news for upcoming fixtures

```php
FootballApi::news()->upcoming();
```

### Odds Inplay

#### Get all inplay odds

```php
FootballApi::oddsInplay()->all();
```

#### Get inplay odds by fixture id

```php
FootballApi::oddsInplay()->byFixture($fixtureId);
```

#### Get inplay odds by fixture id and bookmaker id

```php
FootballApi::oddsInplay()->byFixtureAndBookmaker($fixtureId, $bookmakerId);
```

#### Get inplay odds by fixture id and market id

```php
FootballApi::oddsInplay()->byFixtureAndMarket($fixtureId, $marketId);
```

#### Get last updated inplay odds

```php
FootballApi::oddsInplay()->lastUpdated();
```

### Odds Pre-match

#### Get all pre-match odds

```php
FootballApi::oddsPreMatch()->all();
```

#### Get pre-match odds by fixture id

```php
FootballApi::oddsPreMatch()->byFixture($fixtureId);
```

#### Get pre-match odds by fixture id and bookmaker id

```php
FootballApi::oddsPreMatch()->byFixtureAndBookmaker($fixtureId, $bookmakerId);
```

#### Get pre-match odds by fixture id and market id

```php
FootballApi::oddsPreMatch()->byFixtureAndMarket($fixtureId, $marketId);
```

#### Get last updated pre-match odds

```php
FootballApi::oddsPreMatch()->lastUpdated();
```

### Odds Premium

#### Get all premium odds

```php
FootballApi::oddsPremium()->all();
```

#### Get premium odds by fixture id

```php
FootballApi::oddsPremium()->byFixture($fixtureId);
```

#### Get premium odds by fixture id and bookmaker id

```php
FootballApi::oddsPremium()->byFixtureAndBookmaker($fixtureId, $bookmakerId);
```

#### Get premium odds by fixture id and market id

```php
FootballApi::oddsPremium()->byFixtureAndMarket($fixtureId, $marketId);
```

#### Get updated premium odds between time ranges

```php
FootballApi::oddsPremium()->updatedBetween($from, $to);
```

#### Get historical premium odds between time ranges

```php
FootballApi::oddsPremium()->historicalBetween($from, $to);
```

#### Get all historical premium odds

```php
FootballApi::oddsPremium()->historical();
```

### Players

#### Get all players

```php
FootballApi::players()->all();
```

#### Get player by id

```php
FootballApi::players()->find($playerId);
```

#### Get players by country id

```php
FootballApi::players()->byCountry($countryId);
```

#### Search players by name

```php
FootballApi::players()->search($name);
```

#### Get last updated players

```php
FootballApi::players()->lastUpdated();
```

#### Get transfers by player id

```php
FootballApi::players($playerId)->transfers();
```

#### Get player statistics by season id

```php
FootballApi::players()->statisticsBySeason($seasonId);
```

### Predictions

#### Get all probabilities

```php
FootballApi::predictions()->probabilities();
```

#### Get predictability by league id

```php
FootballApi::predictions()->byLeague($leagueId);
```

#### Get probabilities by fixture id

```php
FootballApi::predictions()->byFixture($fixtureId);
```

#### Get all value bets

```php
FootballApi::predictions()->valueBets();
```

#### Get value bets by fixture id

```php
FootballApi::predictions()->valueBetsByFixture($fixtureId);
```

### Referees

#### Get all referees

```php
FootballApi::referees()->all();
```

#### Get referee by id

```php
FootballApi::referees()->find($refereeId);
```

#### Get referees by country id

```php
FootballApi::referees()->byCountry($countryId);
```

#### Search referees by name

```php
FootballApi::referees()->search($name);
```

#### Search referees by season id

```php
FootballApi::referees()->bySeason($seasonId);
```

#### Get referee statistics by season id

```php
FootballApi::referees()->statisticsBySeason($seasonId);
```

### Regions

#### Get all regions

```php
FootballApi::regions()->all();
```

#### Get region by id

```php
FootballApi::regions()->find($regionId);
```

#### Search regions by name

```php
FootballApi::regions()->search($name);
```

### Resources

#### Get all resources

```php
FootballApi::resources()->all();
```

### Rivals

#### Get all rivals

```php
FootballApi::rivals()->all();
```

#### Get rivals by team id

```php
FootballApi::rivals()->byTeam($teamId);
```

### Rounds

#### Get all rounds

```php
FootballApi::rounds()->all();
```

#### Get round by id

```php
FootballApi::rounds()->find($roundId);
```

#### Get rounds by season id

```php
FootballApi::rounds()->bySeason($seasonId);
```

#### Search rounds by name

```php
FootballApi::rounds()->search($name);
```

#### Get standings by round id

```php
FootballApi::rounds($roundId)->standings();
```

#### Get statistics by round id

```php
FootballApi::rounds($roundId)->statistics();
```

### Schedules

#### Get schedules by season id

```php
FootballApi::schedules()->bySeason($seasonId);
```

#### Get schedules by team id

```php
FootballApi::schedules()->byTeam($teamId);
```

#### Get schedules by season id and team id

```php
FootballApi::schedules()->bySeasonAndTeam($seasonId, $teamId);
```

### Seasons

#### Get all seasons

```php
FootballApi::seasons()->all();
```

#### Get season by id

```php
FootballApi::seasons()->find($seasonId);
```

#### Get seasons by team id

```php
FootballApi::seasons()->byTeam($teamId);
```

#### Search seasons by name

```php
FootballApi::seasons()->search($year);
```

#### Get schedules by season id

```php
FootballApi::seasons($seasonId)->schedules();
```

#### Get schedules by season id and team id

```php
FootballApi::seasons($seasonId)->schedulesByTeam($teamId);
```

#### Get stages by season id

```php
FootballApi::seasons($seasonId)->stages();
```

#### Get rounds by season id

```php
FootballApi::seasons($seasonId)->rounds();
```

#### Get standings by season id

```php
FootballApi::seasons($seasonId)->standings();
```

#### Get standings correction by season id

```php
FootballApi::seasons($seasonId)->standingsCorrection();
```

#### Get topscorers by season id

```php
FootballApi::seasons($seasonId)->topscorers();
```

#### Get teams by season id

```php
FootballApi::seasons($seasonId)->teams();
```

#### Get squads by season id and team id

```php
FootballApi::seasons($seasonId)->squadsByTeam($teamId);
```

#### Get venues by season id

```php
FootballApi::seasons($seasonId)->venues();
```

#### Get news by season id

```php
FootballApi::seasons($seasonId)->news();
```

#### Get referees by season id

```php
FootballApi::seasons($seasonId)->referees();
```

#### Get player statistics by season id

```php
FootballApi::seasons($seasonId)->playerStatistics();
```

#### Get team statistics by season id

```php
FootballApi::seasons($seasonId)->teamStatistics();
```

#### Get coach statistics by season id

```php
FootballApi::seasons($seasonId)->coachStatistics();
```

#### Get referee statistics by season id

```php
FootballApi::seasons($seasonId)->refereeStatistics();
```

### Squads

#### Get current domestic squads by team id

```php
FootballApi::squads()->byTeam($teamId);
```

#### Get all squads by team id based on current seasons

```php
FootballApi::squads()->extendedByTeam($teamId);
```

#### Get squads by team id and season id

```php
FootballApi::squads()->byTeamAndSeason($teamId, $seasonId);
```

### Stages

#### Get all stages

```php
FootballApi::stages()->all();
```

#### Get stage by id

```php
FootballApi::stages()->find($stageId);
```

#### Get stages by season id

```php
FootballApi::stages()->bySeason($seasonId);
```

#### Search stages by name

```php
FootballApi::stages()->search($name);
```

#### Get topscorers by stage id

```php
FootballApi::stages($stageId)->topscorers();
```

#### Get statistics by stage id

```php
FootballApi::stages($stageId)->statistics();
```

### Standings

#### Get all standings

```php
FootballApi::standings()->all();
```

#### Get standings by season id

```php
FootballApi::standings()->bySeason($seasonId);
```

#### Get standings correction by season id

```php
FootballApi::standings()->correctionBySeason($seasonId);
```

#### Get standings by round id

```php
FootballApi::standings()->byRound($roundId);
```

#### Get live standings by league id

```php
FootballApi::standings()->liveByLeague($leagueId);
```

### States

#### Get all states

```php
FootballApi::states()->all();
```

#### Get state by id

```php
 FootballApi::states()->find($stateId);
```

### Statistics

#### Get player statistics by season id

```php
FootballApi::statistics()->playersBySeason($seasonId);
```

#### Get team statistics by season id

```php
FootballApi::statistics()->teamsBySeason($seasonId);
```

#### Get coach statistics by season id

```php
FootballApi::statistics()->coachesBySeason($seasonId);
```

#### Get referee statistics by season id

```php
FootballApi::statistics()->refereesBySeason($seasonId);
```

#### Get statistics by stage id

```php
FootballApi::statistics()->byStage($stageId);
```

#### Get statistics by round id

```php
FootballApi::statistics()->byRound($roundId);
```

### Teams

#### Get all teams

```php
FootballApi::teams()->all();
```

#### Get team by id

```php
FootballApi::teams()->find($teamId);
```

#### Get teams by country id

```php
FootballApi::teams()->byCountry($countryId);
```

#### Get teams by season id

```php
FootballApi::teams()->bySeason($seasonId);
```

#### Search teams by name

```php
FootballApi::teams()->search($name);
```

#### Get fixtures by date range for team

```php
FootballApi::teams($teamId)->fixturesByDateRange($from, $to);
```

#### Get fixtures by head-to-head for team

```php
FootballApi::teams($teamId)->headToHead($opponentId);
```

#### Get all leagues by team id

```php
FootballApi::teams($teamId)->allLeagues();
```

#### Get current leagues by team id

```php
FootballApi::teams($teamId)->currentLeagues();
```

#### Get schedules by team id

```php
FootballApi::teams($teamId)->schedules();
```

#### Get schedules by team id and season id

```php
FootballApi::teams($teamId)->schedulesBySeason($seasonId);
```

#### Get seasons by team id

```php
FootballApi::teams($teamId)->seasons();
```

#### Get current domestic squads by team id

```php
FootballApi::teams($teamId)->squads();
```

#### Get current extended squads by team id

```php
FootballApi::teams($teamId)->extendedSquads();
```

#### Get squads by team id and season id

```php
FootballApi::teams($teamId)->squadsBySeason($seasonId);
```

#### Get transfers by team id

```php
FootballApi::teams($teamId)->transfers();
```

#### Get rivals by team id

```php
FootballApi::teams($teamId)->rivals();
```

#### Get team statistics by season id

```php
FootballApi::teams()->statisticsBySeason($seasonId);
```

### Topscorers

#### Get topscorers by season id

```php
FootballApi::topscorers()->bySeason($seasonId);
```

#### Get topscorers by stage id

```php
FootballApi::topscorers()->byStage($stageId);
```

### Transfers

#### Get all transfers

```php
FootballApi::transfers()->all();
```

#### Get transfer by id

```php
FootballApi::transfers()->find($transferId);
```

#### Get last transfers

```php
FootballApi::transfers()->latest();
```

#### Get transfers between two dates

```php
FootballApi::transfers()->byDateRange($from, $to);
```

#### Get transfers by team id

```php
FootballApi::transfers()->byTeam($teamId);
```

#### Get transfers by player id

```php
FootballApi::transfers()->byPlayer($playerId);
```

### TvStations

#### Get all tv stations

```php
FootballApi::tvStations()->all();
```

#### Get tv station by id

```php
FootballApi::tvStations()->find($tvStationId);
```

#### Get tv stations by fixture id

```php
FootballApi::tvStations()->byFixture($fixtureId);
```

#### Get upcoming fixtures by tv-station id

```php
FootballApi::tvStations($tvStationId)->upcomingFixtures();
```

#### Get past fixtures by tv-station id

```php
FootballApi::tvStations($tvStationId)->pastFixtures();
```

### Types

#### Get all types

```php
FootballApi::types()->all();
```

#### Get type by id

```php
FootballApi::types()->find($typeId);
```

#### Get type by entity

```php
FootballApi::types()->byEntities();
```

### Venues

#### Get all venues

```php
FootballApi::venues()->all();
```

#### Get venue by id

```php
FootballApi::venues()->find($venueId);
```

#### Get venues by season id

```php
FootballApi::venues()->bySeason($seasonId);
```

#### Search venues by name

```php
FootballApi::venues()->search($name);
```
