<?php

namespace Sportmonks\FootballApi\Facades;

class FootballApi
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'football-api';
    }
}
