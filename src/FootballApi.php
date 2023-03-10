<?php

namespace Sportmonks\FootballApi;

use Sportmonks\FootballApi\Endpoints\Fixtures;
use Sportmonks\FootballApi\Endpoints\Leagues;
use Sportmonks\FootballApi\Endpoints\Livescores;
use Sportmonks\FootballApi\Endpoints\Rounds;
use Sportmonks\FootballApi\Endpoints\Schedules;
use Sportmonks\FootballApi\Endpoints\Seasons;
use Sportmonks\FootballApi\Endpoints\Stages;
use Sportmonks\FootballApi\Endpoints\States;
use Sportmonks\FootballApi\Endpoints\Types;

class FootballApi
{
    /**
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/leagues Docs
     */
    public static function leagues () : Leagues
    {
        return new Leagues();
    }

    /**
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/livescores Docs
     */
    public static function livescores () : Livescores
    {
        return new Livescores();
    }

    /**
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/fixtures Docs
     */
    public static function fixtures () : Fixtures
    {
        return new Fixtures();
    }

    /**
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/states Docs
     */
    public static function states () : States
    {
        return new States();
    }

    /**
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/types Docs
     */
    public static function types () : Types
    {
        return new Types();
    }

    /**
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/seasons Docs
     * @param  int|null  $id  the season id
     * @return Seasons
     */
    public static function seasons (?int $id = NULL) : Seasons
    {
        return new Seasons($id);
    }

    /**
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/schedules Docs
     */
    public static function schedules () : Schedules
    {
        return new Schedules();
    }

    /**
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/stages Docs
     */
    public static function stages () : Stages
    {
        return new Stages();
    }

    /**
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/rounds Docs
     */
    public static function rounds () : Rounds
    {
        return new Rounds();
    }
}
