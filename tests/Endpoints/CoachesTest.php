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
    public function it_returns_all_coaches()
    {
        $response = FootballApi::coaches()->all();
        $this->assertEquals('/v3/football/coaches', $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_one_coach()
    {
        $id = 24;

        $response = FootballApi::coaches()->find($id);
        $this->assertEquals("/v3/football/coaches/$id", $response->url->getPath());
        $this->assertIsObject($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_coaches_search()
    {
        $name = 'Klopp';

        $response = FootballApi::coaches()->search($name);
        $this->assertEquals("/v3/football/coaches/search/$name", $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_coaches_by_country_id()
    {
        $countryId = 462;

        $response = FootballApi::coaches()->byCountry($countryId);
        $this->assertEquals("/v3/football/coaches/countries/$countryId", $response->url->getPath());
        $this->assertIsArray($response->data);
    }
}
