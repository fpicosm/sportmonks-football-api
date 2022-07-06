<?php

namespace Sportmonks\FootballApi;

use Sportmonks\FootballApi\Requests\Continent;

class FootballApi
{
    public static function continents(): Continent
    {
        return new Continent();
    }
}
