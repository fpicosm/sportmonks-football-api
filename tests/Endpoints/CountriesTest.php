<?php

namespace Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApi;
use TestCase;

class CountriesTest extends TestCase
{
    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_all_countries()
    {
        $response = FootballApi::countries()->all();
        $this->assertEquals('/v3/core/countries', $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_one_country()
    {
        $id = 2;

        $response = FootballApi::countries()->find($id);
        $this->assertEquals("/v3/core/countries/$id", $response->url->getPath());
        $this->assertIsObject($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_countries_search()
    {
        $name = 'Poland';

        $response = FootballApi::countries()->search($name);
        $this->assertEquals("/v3/core/countries/search/$name", $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_leagues_by_country_id()
    {
        $countryId = 462;

        $response = FootballApi::countries($countryId)->leagues();
        $this->assertEquals("/v3/football/leagues/countries/$countryId", $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_teams_by_country_id()
    {
        $countryId = 462;

        $response = FootballApi::countries($countryId)->teams();
        $this->assertEquals("/v3/football/teams/countries/$countryId", $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_players_by_country_id()
    {
        $countryId = 462;

        $response = FootballApi::countries($countryId)->players();
        $this->assertEquals("/v3/football/players/countries/$countryId", $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_coaches_by_country_id()
    {
        $countryId = 462;

        $response = FootballApi::countries($countryId)->coaches();
        $this->assertEquals("/v3/football/coaches/countries/$countryId", $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_referees_by_country_id()
    {
        $countryId = 462;

        $response = FootballApi::countries($countryId)->referees();
        $this->assertEquals("/v3/football/referees/countries/$countryId", $response->url->getPath());
        $this->assertIsArray($response->data);
    }
}
