<?php

namespace Sportmonks\FootballApi;

// @TODO odds, predictions
use Sportmonks\FootballApi\Endpoints\Bookmakers;
use Sportmonks\FootballApi\Endpoints\Coaches;
use Sportmonks\FootballApi\Endpoints\Commentaries;
use Sportmonks\FootballApi\Endpoints\Continents;
use Sportmonks\FootballApi\Endpoints\Countries;
use Sportmonks\FootballApi\Endpoints\Fixtures;
use Sportmonks\FootballApi\Endpoints\HeadToHead;
use Sportmonks\FootballApi\Endpoints\Highlights;
use Sportmonks\FootballApi\Endpoints\Leagues;
use Sportmonks\FootballApi\Endpoints\Livescores;
use Sportmonks\FootballApi\Endpoints\Markets;
use Sportmonks\FootballApi\Endpoints\News;
use Sportmonks\FootballApi\Endpoints\Players;
use Sportmonks\FootballApi\Endpoints\Rivals;
use Sportmonks\FootballApi\Endpoints\Rounds;
use Sportmonks\FootballApi\Endpoints\Seasons;
use Sportmonks\FootballApi\Endpoints\Stages;
use Sportmonks\FootballApi\Endpoints\Standings;
use Sportmonks\FootballApi\Endpoints\Teams;
use Sportmonks\FootballApi\Endpoints\TeamSquads;
use Sportmonks\FootballApi\Endpoints\Topscorers;
use Sportmonks\FootballApi\Endpoints\TvStations;
use Sportmonks\FootballApi\Endpoints\Venues;

class FootballApi
{
    public static function bookmakers () : Bookmakers
    {
        return new Bookmakers();
    }

    public static function coaches () : Coaches
    {
        return new Coaches();
    }

    public static function commentaries () : Commentaries
    {
        return new Commentaries();
    }

    public static function continents () : Continents
    {
        return new Continents();
    }

    public static function countries (?int $id = NULL) : Countries
    {
        return new Countries($id);
    }

    public static function fixtures (?int $id = NULL) : Fixtures
    {
        return new Fixtures($id);
    }

    public static function headToHead () : HeadToHead
    {
        return new HeadToHead();
    }

    public static function highlights () : Highlights
    {
        return new Highlights();
    }

    public static function leagues () : Leagues
    {
        return new Leagues();
    }

    public static function livescores () : Livescores
    {
        return new Livescores();
    }

    public static function markets (?int $id = NULL) : Markets
    {
        return new Markets($id);
    }

    public static function news () : News
    {
        return new News();
    }

    public static function players () : Players
    {
        return new Players();
    }

    public static function rivals () : Rivals
    {
        return new Rivals();
    }

    public static function rounds () : Rounds
    {
        return new Rounds();
    }

    public static function seasons (?int $id = NULL) : Seasons
    {
        return new Seasons($id);
    }

    public static function stages () : Stages
    {
        return new Stages();
    }

    public static function standings () : Standings
    {
        return new Standings();
    }

    public static function teams (?int $id = NULL) : Teams
    {
        return new Teams($id);
    }

    public static function teamSquads () : TeamSquads
    {
        return new TeamSquads();
    }

    public static function topscorers () : Topscorers
    {
        return new Topscorers();
    }

    public static function tvStations () : TvStations
    {
        return new TvStations();
    }

    public static function venues () : Venues
    {
        return new Venues();
    }
}
