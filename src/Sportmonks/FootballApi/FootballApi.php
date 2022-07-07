<?php

namespace Sportmonks\FootballApi;

use Sportmonks\FootballApi\Endpoints\City;
use Sportmonks\FootballApi\Endpoints\Coach;
use Sportmonks\FootballApi\Endpoints\Commentary;
use Sportmonks\FootballApi\Endpoints\Continent;
use Sportmonks\FootballApi\Endpoints\Country;
use Sportmonks\FootballApi\Endpoints\Fixture;
use Sportmonks\FootballApi\Endpoints\Highlight;
use Sportmonks\FootballApi\Endpoints\League;
use Sportmonks\FootballApi\Endpoints\LiveScore;
use Sportmonks\FootballApi\Endpoints\Player;
use Sportmonks\FootballApi\Endpoints\Prediction;
use Sportmonks\FootballApi\Endpoints\Referee;
use Sportmonks\FootballApi\Endpoints\Region;
use Sportmonks\FootballApi\Endpoints\Rival;
use Sportmonks\FootballApi\Endpoints\Round;
use Sportmonks\FootballApi\Endpoints\Schedule;
use Sportmonks\FootballApi\Endpoints\Season;
use Sportmonks\FootballApi\Endpoints\Stage;
use Sportmonks\FootballApi\Endpoints\Standing;
use Sportmonks\FootballApi\Endpoints\State;
use Sportmonks\FootballApi\Endpoints\Team;
use Sportmonks\FootballApi\Endpoints\TeamSquad;
use Sportmonks\FootballApi\Endpoints\Transfer;
use Sportmonks\FootballApi\Endpoints\TvStation;
use Sportmonks\FootballApi\Endpoints\Type;
use Sportmonks\FootballApi\Endpoints\Venue;

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

    public static function fixtures(?int $id = null): Fixture
    {
        return new Fixture($id);
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

    public static function states(): State
    {
        return new State();
    }

    public static function rivals(): Rival
    {
        return new Rival();
    }

    public static function tvStations(): TvStation
    {
        return new TvStation();
    }

    public static function commentaries(): Commentary
    {
        return new Commentary();
    }

    public static function highlights(): Highlight
    {
        return new Highlight();
    }

    public static function livescores(): LiveScore
    {
        return new LiveScore();
    }

    public static function predictions(): Prediction
    {
        return new Prediction();
    }
}
