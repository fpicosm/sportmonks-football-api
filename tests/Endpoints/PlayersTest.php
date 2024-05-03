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
    public function it_returns_all_players()
    {
        $response = FootballApi::players()->all();
        $this->assertEquals('/v3/football/players', $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_one_player()
    {
        $id = 14;

        $response = FootballApi::players()->find($id);
        $this->assertEquals("/v3/football/players/$id", $response->url->getPath());
        $this->assertIsObject($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_players_by_country_id()
    {
        $countryId = 320;

        $response = FootballApi::players()->byCountry($countryId);
        $this->assertEquals("/v3/football/players/countries/$countryId", $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_players_search()
    {
        $name = 'Messi';

        $response = FootballApi::players()->search($name);
        $this->assertEquals("/v3/football/players/search/$name", $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_last_updated_players()
    {
        $response = FootballApi::players()->lastUpdated();
        $this->assertEquals('/v3/football/players/latest', $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_transfers_by_player_id()
    {
        $playerId = 205981;

        $response = FootballApi::players($playerId)->transfers();
        $this->assertEquals("/v3/football/transfers/players/$playerId", $response->url->getPath());
        $this->assertIsArray($response->data);
    }
}
