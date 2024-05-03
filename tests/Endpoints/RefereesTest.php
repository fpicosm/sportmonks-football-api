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
    public function it_returns_all_referees()
    {
        $response = FootballApi::referees()->all();
        $this->assertEquals('/v3/football/referees', $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_one_referee()
    {
        $id = 28;

        $response = FootballApi::referees()->find($id);
        $this->assertEquals("/v3/football/referees/$id", $response->url->getPath());
        $this->assertIsObject($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_referees_by_country_id()
    {
        $countryId = 38;

        $response = FootballApi::referees()->byCountry($countryId);
        $this->assertEquals("/v3/football/referees/countries/$countryId", $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_referees_search()
    {
        $name = 'Kuipers';

        $response = FootballApi::referees()->search($name);
        $this->assertEquals("/v3/football/referees/search/$name", $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_referees_by_season_id()
    {
        $seasonId = 21646;

        $response = FootballApi::referees()->bySeason($seasonId);
        $this->assertEquals("/v3/football/referees/seasons/$seasonId", $response->url->getPath());
        $this->assertIsArray($response->data);
    }
}
