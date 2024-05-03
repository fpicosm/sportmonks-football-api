<?php

namespace Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApi;
use TestCase;

class TransfersTest extends TestCase
{
    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_all_transfers()
    {
        $response = FootballApi::transfers()->all();
        $this->assertEquals('/v3/football/transfers', $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_one_transfer()
    {
        $id = 228363;

        $response = FootballApi::transfers()->find($id);
        $this->assertEquals("/v3/football/transfers/$id", $response->url->getPath());
        $this->assertIsObject($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_the_latest_transfers()
    {
        $response = FootballApi::transfers()->latest();
        $this->assertEquals('/v3/football/transfers/latest', $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_transfers_by_team_id()
    {
        $teamId = 3736;

        $response = FootballApi::transfers()->byTeam($teamId);
        $this->assertEquals("/v3/football/transfers/teams/$teamId", $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_transfers_by_date_range()
    {
        $from = '2021-12-27';
        $to = '2021-12-30';

        $response = FootballApi::transfers()->byDateRange($from, $to);
        $this->assertEquals("/v3/football/transfers/between/$from/$to", $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_transfers_by_player_id()
    {
        $playerId = 205981;

        $response = FootballApi::transfers()->byPlayer($playerId);
        $this->assertEquals("/v3/football/transfers/players/$playerId", $response->url->getPath());
        $this->assertIsArray($response->data);
    }
}
