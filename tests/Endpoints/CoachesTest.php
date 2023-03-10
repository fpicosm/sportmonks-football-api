<?php

namespace Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApi;
use TestCase;

class CoachesTest extends TestCase
{
    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_all_coaches ()
    {
        $url = FootballApi::coaches()->all()->url->getPath();
        $this->assertEquals('/v3/football/coaches', $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_one_coach ()
    {
        $id = 24;
        $url = FootballApi::coaches()->byId($id)->url->getPath();
        $this->assertEquals("/v3/football/coaches/$id", $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_coaches_search ()
    {
        $name = 'Klopp';
        $url = FootballApi::coaches()->search($name)->url->getPath();
        $this->assertEquals("/v3/football/coaches/search/$name", $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_coaches_by_country_id ()
    {
        $countryId = 462;
        $url = FootballApi::coaches()->byCountryId($countryId)->url->getPath();
        $this->assertEquals("/v3/football/coaches/countries/$countryId", $url);
    }
}