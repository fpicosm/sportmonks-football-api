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
     * @param  int|null  $id  the league id
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
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/fixtures Docs
     * @return Fixtures
     */
    public static function fixtures () : Fixtures
    {
        return new Fixtures();
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
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/types Docs
     * @return Types
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
     * @return Schedules
     */
    public static function schedules () : Schedules
    {
        return new Schedules();
    }

    /**
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/stages Docs
     * @param  int|null  $id  the stage id
     * @return Stages
     */
    public static function stages (?int $id = NULL) : Stages
    {
        return new Stages($id);
    }

    /**
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/rounds Docs
     * @param  int|null  $id  the round id
     * @return Rounds
     */
    public static function rounds (?int $id = NULL) : Rounds
    {
        return new Rounds($id);
    }
}
