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
    public function it_returns_all_countries ()
    {
        $url = FootballApi::countries()->all()->url->getPath();
        $this->assertEquals('/v3/core/countries', $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_one_country ()
    {
        $id = 2;
        $url = FootballApi::countries()->byId($id)->url->getPath();
        $this->assertEquals("/v3/core/countries/$id", $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_countries_search ()
    {
        $name = 'Pol';
        $url = FootballApi::countries()->search($name)->url->getPath();
        $this->assertEquals("/v3/core/countries/search/$name", $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_leagues_by_country_id ()
    {
        $countryId = 320;
        $url = FootballApi::countries($countryId)->leagues()->url->getPath();
        $this->assertEquals("/v3/football/leagues/countries/$countryId", $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_teams_by_country_id ()
    {
        $countryId = 320;
        $url = FootballApi::countries($countryId)->teams()->url->getPath();
        $this->assertEquals("/v3/football/teams/countries/$countryId", $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_players_by_country_id ()
    {
        $countryId = 320;
        $url = FootballApi::countries($countryId)->players()->url->getPath();
        $this->assertEquals("/v3/football/players/countries/$countryId", $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_coaches_by_country_id ()
    {
        $countryId = 320;
        $url = FootballApi::countries($countryId)->coaches()->url->getPath();
        $this->assertEquals("/v3/football/coaches/countries/$countryId", $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_referees_by_country_id ()
    {
        $countryId = 320;
        $url = FootballApi::countries($countryId)->referees()->url->getPath();
        $this->assertEquals("/v3/football/referees/countries/$countryId", $url);
    }
}