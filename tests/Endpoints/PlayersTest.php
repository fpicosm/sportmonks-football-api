<?php

namespace Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApi;
use TestCase;

class PlayersTest extends TestCase
{
    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_all_players ()
    {
        $url = FootballApi::players()->all()->url->getPath();
        $this->assertEquals('/v3/football/players', $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_one_player ()
    {
        $id = 14;
        $url = FootballApi::players()->byId($id)->url->getPath();
        $this->assertEquals("/v3/football/players/$id", $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_players_by_country_id ()
    {
        $countryId = 320;
        $url = FootballApi::players()->byCountryId($countryId)->url->getPath();
        $this->assertEquals("/v3/football/players/countries/$countryId", $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_one_players_search ()
    {
        $name = 'Agg';
        $url = FootballApi::players()->search($name)->url->getPath();
        $this->assertEquals("/v3/football/players/search/$name", $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_last_updated_players ()
    {
        $url = FootballApi::players()->latest()->url->getPath();
        $this->assertEquals('/v3/football/players/latest', $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_transfers_by_player_id ()
    {
        $playerId = 35659846;
        $url = FootballApi::players($playerId)->transfers()->url->getPath();
        $this->assertEquals("/v3/football/transfers/players/$playerId", $url);
    }
}
