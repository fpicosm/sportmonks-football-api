<?php

namespace Sportmonks\FootballApi;

use Sportmonks\FootballApi\Endpoints\Bookmakers;
use Sportmonks\FootballApi\Endpoints\Cities;
use Sportmonks\FootballApi\Endpoints\Coaches;
use Sportmonks\FootballApi\Endpoints\Commentaries;
use Sportmonks\FootballApi\Endpoints\Continents;
use Sportmonks\FootballApi\Endpoints\Countries;
use Sportmonks\FootballApi\Endpoints\Enrichments;
use Sportmonks\FootballApi\Endpoints\Expected;
use Sportmonks\FootballApi\Endpoints\Filters;
use Sportmonks\FootballApi\Endpoints\Fixtures;
use Sportmonks\FootballApi\Endpoints\Leagues;
use Sportmonks\FootballApi\Endpoints\Livescores;
use Sportmonks\FootballApi\Endpoints\Markets;
use Sportmonks\FootballApi\Endpoints\News;
use Sportmonks\FootballApi\Endpoints\OddsInplay;
use Sportmonks\FootballApi\Endpoints\OddsPreMatch;
use Sportmonks\FootballApi\Endpoints\OddsPremium;
use Sportmonks\FootballApi\Endpoints\Players;
use Sportmonks\FootballApi\Endpoints\Predictions;
use Sportmonks\FootballApi\Endpoints\Referees;
use Sportmonks\FootballApi\Endpoints\Regions;
use Sportmonks\FootballApi\Endpoints\Resources;
use Sportmonks\FootballApi\Endpoints\Rivals;
use Sportmonks\FootballApi\Endpoints\Rounds;
use Sportmonks\FootballApi\Endpoints\Schedules;
use Sportmonks\FootballApi\Endpoints\Seasons;
use Sportmonks\FootballApi\Endpoints\Squads;
use Sportmonks\FootballApi\Endpoints\Stages;
use Sportmonks\FootballApi\Endpoints\Standings;
use Sportmonks\FootballApi\Endpoints\States;
use Sportmonks\FootballApi\Endpoints\Statistics;
use Sportmonks\FootballApi\Endpoints\Teams;
use Sportmonks\FootballApi\Endpoints\Topscorers;
use Sportmonks\FootballApi\Endpoints\Transfers;
use Sportmonks\FootballApi\Endpoints\TvStations;
use Sportmonks\FootballApi\Endpoints\Types;
use Sportmonks\FootballApi\Endpoints\Venues;

class FootballApi
{
    public static function bookmakers(int $id = null): Bookmakers
    {
        return new Bookmakers($id);
    }

    public static function cities(): Cities
    {
        return new Cities();
    }

    public static function coaches(): Coaches
    {
        return new Coaches();
    }

    public static function commentaries(): Commentaries
    {
        return new Commentaries();
    }

    public static function continents(): Continents
    {
        return new Continents();
    }

    public static function countries(int $id = null): Countries
    {
        return new Countries($id);
    }

    public static function enrichments(): Enrichments
    {
        return new Enrichments();
    }

    public static function filters(): Filters
    {
        return new Filters();
    }

    public static function fixtures(int $id = null): Fixtures
    {
        return new Fixtures($id);
    }

    public static function leagues(int $id = null): Leagues
    {
        return new Leagues($id);
    }

    public static function livescores(): Livescores
    {
        return new Livescores();
    }

    public static function markets(int $id = null): Markets
    {
        return new Markets($id);
    }

    public static function news(): News
    {
        return new News();
    }

    public static function players(int $id = null): Players
    {
        return new Players($id);
    }

    public static function predictions(): Predictions
    {
        return new Predictions();
    }

    public static function referees(): Referees
    {
        return new Referees();
    }

    public static function regions(): Regions
    {
        return new Regions();
    }

    public static function resources(): Resources
    {
        return new Resources();
    }

    public static function rivals(): Rivals
    {
        return new Rivals();
    }

    public static function rounds(int $id = null): Rounds
    {
        return new Rounds($id);
    }

    public static function schedules(): Schedules
    {
        return new Schedules();
    }

    public static function seasons(int $id = null): Seasons
    {
        return new Seasons($id);
    }

    public static function squads(): Squads
    {
        return new Squads();
    }

    public static function stages(int $id = null): Stages
    {
        return new Stages($id);
    }

    public static function standings(): Standings
    {
        return new Standings();
    }

    public static function states(): States
    {
        return new States();
    }

    public static function teams(int $id = null): Teams
    {
        return new Teams($id);
    }

    public static function topscorers(): Topscorers
    {
        return new Topscorers();
    }

    public static function transfers(): Transfers
    {
        return new Transfers();
    }

    public static function tvStations(int $id = null): TvStations
    {
        return new TvStations($id);
    }

    public static function types(): Types
    {
        return new Types();
    }

    public static function venues(): Venues
    {
        return new Venues();
    }

    public static function expected(): Expected
    {
        return new Expected();
    }

    public static function oddsInplay(): OddsInplay
    {
        return new OddsInplay();
    }

    public static function oddsPreMatch(): OddsPreMatch
    {
        return new OddsPreMatch();
    }

    public static function oddsPremium(): OddsPremium
    {
        return new OddsPremium();
    }

    public static function statistics(): Statistics
    {
        return new Statistics();
    }
}
