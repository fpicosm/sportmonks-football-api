<?php

namespace Sportmonks\FootballApi;

use Sportmonks\FootballApi\Requests\City;
use Sportmonks\FootballApi\Requests\Coach;
use Sportmonks\FootballApi\Requests\Continent;
use Sportmonks\FootballApi\Requests\Country;
use Sportmonks\FootballApi\Requests\Fixture;
use Sportmonks\FootballApi\Requests\League;
use Sportmonks\FootballApi\Requests\Player;
use Sportmonks\FootballApi\Requests\Referee;
use Sportmonks\FootballApi\Requests\Region;
use Sportmonks\FootballApi\Requests\Round;
use Sportmonks\FootballApi\Requests\Schedule;
use Sportmonks\FootballApi\Requests\Season;
use Sportmonks\FootballApi\Requests\Stage;
use Sportmonks\FootballApi\Requests\Standing;
use Sportmonks\FootballApi\Requests\Team;
use Sportmonks\FootballApi\Requests\TeamSquad;
use Sportmonks\FootballApi\Requests\Transfer;
use Sportmonks\FootballApi\Requests\Type;
use Sportmonks\FootballApi\Requests\Venue;

class FootballApi
{
    public static function cities(): City
    {
        return new City();
    }

    public static function continents(): Continent
    {
        return new Continent();
    }

    public static function countries(?int $id = null): Country
    {
        return new Country($id);
    }

    public static function fixtures(): Fixture
    {
        return new Fixture();
    }

    public static function regions(): Region
    {
        return new Region();
    }

    public static function types(): Type
    {
        return new Type();
    }

    public static function leagues(?int $id = null): League
    {
        return new League($id);
    }

    public static function seasons(?int $id = null): Season
    {
        return new Season($id);
    }

    public static function teams(?int $id = null): Team
    {
        return new Team($id);
    }

    public static function players(?int $id = null): Player
    {
        return new Player($id);
    }

    public static function stages(): Stage
    {
        return new Stage();
    }

    public static function rounds(?int $id = null): Round
    {
        return new Round($id);
    }

    public static function teamSquads(): TeamSquad
    {
        return new TeamSquad();
    }

    public static function venues(): Venue
    {
        return new Venue();
    }

    public static function coaches(): Coach
    {
        return new Coach();
    }

    public static function referees(): Referee
    {
        return new Referee();
    }

    public static function transfers(): Transfer
    {
        return new Transfer();
    }

    public static function standings(): Standing
    {
        return new Standing();
    }

    public static function schedules(): Schedule
    {
        return new Schedule();
    }
}
