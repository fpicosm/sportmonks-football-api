<?php

namespace Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApi;
use TestCase;

class VenuesTest extends TestCase
{
    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_all_venues()
    {
        $response = FootballApi::venues()->all();
        $this->assertEquals('/v3/football/venues', $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_one_venue()
    {
        $id = 1;

        $response = FootballApi::venues()->find($id);
        $this->assertEquals("/v3/football/venues/$id", $response->url->getPath());
        $this->assertIsObject($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_venues_by_season_id()
    {
        $seasonId = 19686;

        $response = FootballApi::venues()->bySeason($seasonId);
        $this->assertEquals("/v3/football/venues/seasons/$seasonId", $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_venues_search()
    {
        $name = 'Meadowbank';

        $response = FootballApi::venues()->search($name);
        $this->assertEquals("/v3/football/venues/search/$name", $response->url->getPath());
        $this->assertIsArray($response->data);
    }
}
