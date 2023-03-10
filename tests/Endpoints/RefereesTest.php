<?php

namespace Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApi;
use TestCase;

class RefereesTest extends TestCase
{
    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_all_referees ()
    {
        $url = FootballApi::referees()->all()->url->getPath();
        $this->assertEquals('/v3/football/referees', $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_one_referee ()
    {
        $id = 11698;
        $url = FootballApi::referees()->byId($id)->url->getPath();
        $this->assertEquals("/v3/football/referees/$id", $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_referees_by_country_id ()
    {
        $countryId = 320;
        $url = FootballApi::referees()->byCountryId($countryId)->url->getPath();
        $this->assertEquals("/v3/football/referees/countries/$countryId", $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_one_referees_search ()
    {
        $name = 'Munch';
        $url = FootballApi::referees()->search($name)->url->getPath();
        $this->assertEquals("/v3/football/referees/search/$name", $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_last_updated_referees ()
    {
        $url = FootballApi::referees()->latest()->url->getPath();
        $this->assertEquals('/v3/football/referees/latest', $url);
    }
}
