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
    public function it_returns_all_venues ()
    {
        $url = FootballApi::venues()->all()->url->getPath();
        $this->assertEquals('/v3/football/venues', $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_one_venue ()
    {
        $id = 219;
        $url = FootballApi::venues()->byId($id)->url->getPath();
        $this->assertEquals("/v3/football/venues/$id", $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_venues_by_season_id ()
    {
        $seasonId = 19686;
        $url = FootballApi::venues()->bySeasonId($seasonId)->url->getPath();
        $this->assertEquals("/v3/football/venues/seasons/$seasonId", $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_one_venues_search ()
    {
        $name = 'Hors';
        $url = FootballApi::venues()->search($name)->url->getPath();
        $this->assertEquals("/v3/football/venues/search/$name", $url);
    }
}