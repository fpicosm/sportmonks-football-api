<?php

namespace Sportmonks\FootballApi;

use Sportmonks\FootballApi\Endpoints\Bookmakers;
use Sportmonks\FootballApi\Endpoints\Cities;
use Sportmonks\FootballApi\Endpoints\Coaches;
use Sportmonks\FootballApi\Endpoints\Commentaries;
use Sportmonks\FootballApi\Endpoints\Continents;
use Sportmonks\FootballApi\Endpoints\Countries;
use Sportmonks\FootballApi\Endpoints\Enrichments;
use Sportmonks\FootballApi\Endpoints\Filters;
use Sportmonks\FootballApi\Endpoints\Fixtures;
use Sportmonks\FootballApi\Endpoints\Leagues;
use Sportmonks\FootballApi\Endpoints\Livescores;
use Sportmonks\FootballApi\Endpoints\Markets;
use Sportmonks\FootballApi\Endpoints\News;
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
use Sportmonks\FootballApi\Endpoints\Teams;
use Sportmonks\FootballApi\Endpoints\Topscorers;
use Sportmonks\FootballApi\Endpoints\Transfers;
use Sportmonks\FootballApi\Endpoints\TvStations;
use Sportmonks\FootballApi\Endpoints\Types;
use Sportmonks\FootballApi\Endpoints\Venues;

// TODO ODDS
class FootballApi
{
    /**
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/bookmakers Docs
     * @return Bookmakers
     */
    public static function bookmakers(): Bookmakers
    {
        return new Bookmakers();
    }

    /**
     * @link https://docs.sportmonks.com/football/v/core-api/endpoints/cities Docs
     * @return Cities
     */
    public static function cities(): Cities
    {
        return new Cities();
    }

    /**
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/coaches Docs
     * @return Coaches
     */
    public static function coaches(): Coaches
    {
        return new Coaches();
    }

    /**
     * @link https://docs.sportmonks.com/football/v/core-api/endpoints/commentaries Docs
     * @return Commentaries
     */
    public static function commentaries(): Commentaries
    {
        return new Commentaries();
    }

    /**
     * @link https://docs.sportmonks.com/football/v/core-api/endpoints/continents Docs
     * @return Continents
     */
    public static function continents(): Continents
    {
        return new Continents();
    }

    /**
     * @link https://docs.sportmonks.com/football/v/core-api/endpoints/countries Docs
     * @param int|null $id the country id
     * @return Countries
     */
    public static function countries(?int $id = null): Countries
    {
        return new Countries($id);
    }

    /**
     * @link https://docs.sportmonks.com/football/v/core-api/endpoints/my-sportmonks/get-my-enrichments Docs
     * @return Enrichments
     */
    public static function enrichments(): Enrichments
    {
        return new Enrichments();
    }

    /**
     * @link https://docs.sportmonks.com/football/v/core-api/endpoints/filters Docs
     * @return Filters
     */
    public static function filters(): Filters
    {
        return new Filters();
    }

    /**
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/fixtures Docs
     * @param int|null $id
     * @return Fixtures
     */
    public static function fixtures(int $id = null): Fixtures
    {
        return new Fixtures($id);
    }

    /**
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/leagues Docs
     * @param int|null $id the league id
     * @return Leagues
     */
    public static function leagues(?int $id = null): Leagues
    {
        return new Leagues($id);
    }

    /**
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/livescores Docs
     * @return Livescores
     */
    public static function livescores(): Livescores
    {
        return new Livescores();
    }

    /**
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/markets Docs
     * @return Markets
     */
    public static function markets(): Markets
    {
        return new Markets();
    }

    /**
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/news Docs
     * @return News
     */
    public static function news(): News
    {
        return new News();
    }

    /**
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/players Docs
     * @param int|null $id
     * @return Players
     */
    public static function players(int $id = null): Players
    {
        return new Players($id);
    }

    /**
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/predictions Docs
     * @return Predictions
     */
    public static function predictions(): Predictions
    {
        return new Predictions();
    }

    /**
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/referees Docs
     * @return Referees
     */
    public static function referees(): Referees
    {
        return new Referees();
    }

    /**
     * @link https://docs.sportmonks.com/football/v/core-api/endpoints/regions Docs
     * @return Regions
     */
    public static function regions(): Regions
    {
        return new Regions();
    }

    /**
     * @link https://docs.sportmonks.com/football/v/core-api/endpoints/my-sportmonks/get-my-resources Docs
     * @return Resources
     */
    public static function resources(): Resources
    {
        return new Resources();
    }

    /**
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/rivals Docs
     * @return Rivals
     */
    public static function rivals(): Rivals
    {
        return new Rivals();
    }

    /**
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/rounds Docs
     * @param int|null $id the round id
     * @return Rounds
     */
    public static function rounds(?int $id = null): Rounds
    {
        return new Rounds($id);
    }

    /**
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/schedules Docs
     * @return Schedules
     */
    public static function schedules(): Schedules
    {
        return new Schedules();
    }

    /**
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/seasons Docs
     * @param int|null $id the season id
     * @return Seasons
     */
    public static function seasons(?int $id = null): Seasons
    {
        return new Seasons($id);
    }

    /**
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/team-squads Docs
     * @return Squads
     */
    public static function squads(): Squads
    {
        return new Squads();
    }

    /**
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/stages Docs
     * @param int|null $id the stage id
     * @return Stages
     */
    public static function stages(?int $id = null): Stages
    {
        return new Stages($id);
    }

    /**
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/standings Docs
     * @return Standings
     */
    public static function standings(): Standings
    {
        return new Standings();
    }

    /**
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/states Docs
     * @return States
     */
    public static function states(): States
    {
        return new States();
    }

    /**
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/teams Docs
     * @param int|null $id the team id
     * @return Teams
     */
    public static function teams(int $id = null): Teams
    {
        return new Teams($id);
    }

    /**
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/topscorers Docs
     * @return Topscorers
     */
    public static function topscorers(): Topscorers
    {
        return new Topscorers();
    }

    /**
     * https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/transfers Docs
     *
     * @return Transfers
     */
    public static function transfers(): Transfers
    {
        return new Transfers();
    }

    /**
     * https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/tv-stations Docs
     *
     * @return TvStations
     */
    public static function tvStations(): TvStations
    {
        return new TvStations();
    }

    /**
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/types Docs
     * @return Types
     */
    public static function types(): Types
    {
        return new Types();
    }

    /**
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/venues Docs
     * @return Venues
     */
    public static function venues(): Venues
    {
        return new Venues();
    }
}
