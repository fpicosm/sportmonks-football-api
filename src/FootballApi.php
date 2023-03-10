<?php

namespace Sportmonks\FootballApi;

use Sportmonks\FootballApi\Endpoints\Cities;
use Sportmonks\FootballApi\Endpoints\Continents;
use Sportmonks\FootballApi\Endpoints\Countries;
use Sportmonks\FootballApi\Endpoints\Enrichments;
use Sportmonks\FootballApi\Endpoints\Filters;
use Sportmonks\FootballApi\Endpoints\Fixtures;
use Sportmonks\FootballApi\Endpoints\Leagues;
use Sportmonks\FootballApi\Endpoints\Livescores;
use Sportmonks\FootballApi\Endpoints\Regions;
use Sportmonks\FootballApi\Endpoints\Resources;
use Sportmonks\FootballApi\Endpoints\Rounds;
use Sportmonks\FootballApi\Endpoints\Schedules;
use Sportmonks\FootballApi\Endpoints\Seasons;
use Sportmonks\FootballApi\Endpoints\Stages;
use Sportmonks\FootballApi\Endpoints\Standings;
use Sportmonks\FootballApi\Endpoints\States;
use Sportmonks\FootballApi\Endpoints\Teams;
use Sportmonks\FootballApi\Endpoints\Topscorers;
use Sportmonks\FootballApi\Endpoints\Types;

class FootballApi
{
    /**
     * @link https://docs.sportmonks.com/football/v/core-api/endpoints/cities Docs
     * @return Cities
     */
    public static function cities () : Cities
    {
        return new Cities();
    }

    /**
     * @link https://docs.sportmonks.com/football/v/core-api/endpoints/continents Docs
     * @return Continents
     */
    public static function continents () : Continents
    {
        return new Continents();
    }

    /**
     * @link https://docs.sportmonks.com/football/v/core-api/endpoints/countries Docs
     * @param  int|NULL  $id  the country id
     * @return Countries
     */
    public static function countries (?int $id = NULL) : Countries
    {
        return new Countries($id);
    }

    /**
     * @link https://docs.sportmonks.com/football/v/core-api/endpoints/my-sportmonks/get-my-enrichments Docs
     * @return Enrichments
     */
    public static function enrichments () : Enrichments
    {
        return new Enrichments();
    }

    /**
     * @link https://docs.sportmonks.com/football/v/core-api/endpoints/filters Docs
     * @return Filters
     */
    public static function filters () : Filters
    {
        return new Filters();
    }

    /**
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/fixtures Docs
     * @return Fixtures
     */
    public static function fixtures () : Fixtures
    {
        return new Fixtures();
    }

    /**
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/leagues Docs
     * @param  int|NULL  $id  the league id
     * @return Leagues
     */
    public static function leagues (?int $id = NULL) : Leagues
    {
        return new Leagues($id);
    }

    /**
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/livescores Docs
     * @return Livescores
     */
    public static function livescores () : Livescores
    {
        return new Livescores();
    }

    /**
     * @link https://docs.sportmonks.com/football/v/core-api/endpoints/regions Docs
     * @return Regions
     */
    public static function regions () : Regions
    {
        return new Regions();
    }

    /**
     * @link https://docs.sportmonks.com/football/v/core-api/endpoints/my-sportmonks/get-my-resources Docs
     * @return Resources
     */
    public static function resources () : Resources
    {
        return new Resources();
    }


    /**
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/rounds Docs
     * @param  int|NULL  $id  the round id
     * @return Rounds
     */
    public static function rounds (?int $id = NULL) : Rounds
    {
        return new Rounds($id);
    }

    /**
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/schedules Docs
     * @return Schedules
     */
    public static function schedules () : Schedules
    {
        return new Schedules();
    }

    /**
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/seasons Docs
     * @param  int|NULL  $id  the season id
     * @return Seasons
     */
    public static function seasons (?int $id = NULL) : Seasons
    {
        return new Seasons($id);
    }

    /**
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/stages Docs
     * @param  int|NULL  $id  the stage id
     * @return Stages
     */
    public static function stages (?int $id = NULL) : Stages
    {
        return new Stages($id);
    }

    /**
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/standings Docs
     * @return Standings
     */
    public static function standings () : Standings
    {
        return new Standings();
    }

    /**
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/states Docs
     * @return States
     */
    public static function states () : States
    {
        return new States();
    }

    /**
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/teams Docs
     * @param  int|NULL  $id  the team id
     * @return Teams
     */
    public static function teams (int $id = NULL) : Teams
    {
        return new Teams($id);
    }

    /**
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/topscorers Docs
     * @return Topscorers
     */
    public static function topscorers () : Topscorers
    {
        return new Topscorers();
    }

    /**
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/types Docs
     * @return Types
     */
    public static function types () : Types
    {
        return new Types();
    }
}
