<?php

namespace Sportmonks\FootballApi;

use Sportmonks\FootballApi\Requests\City;
use Sportmonks\FootballApi\Requests\Continent;
use Sportmonks\FootballApi\Requests\Country;
use Sportmonks\FootballApi\Requests\League;
use Sportmonks\FootballApi\Requests\Region;
use Sportmonks\FootballApi\Requests\Type;

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

    public static function countries(): Country
    {
        return new Country();
    }

    public static function regions(): Region
    {
        return new Region();
    }

    public static function types(): Type
    {
        return new Type();
    }

    public static function leagues(): League
    {
        return new League();
    }
}
