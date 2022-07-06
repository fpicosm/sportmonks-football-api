<?php

namespace Sportmonks\FootballApi;

use Sportmonks\FootballApi\Requests\Continent;
use Sportmonks\FootballApi\Requests\Country;
use Sportmonks\FootballApi\Requests\Region;

class FootballApi
{
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
}
