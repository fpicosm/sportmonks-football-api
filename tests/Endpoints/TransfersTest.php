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
        $url = FootballApi::transfers()->all()->url->getPath();
        $this->assertEquals('/v3/football/transfers', $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_one_transfer()
    {
        $id = 1;
        $url = FootballApi::transfers()->byId($id)->url->getPath();
        $this->assertEquals("/v3/football/transfers/$id", $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_the_latest_transfers()
    {
        $url = FootballApi::transfers()->latest()->url->getPath();
        $this->assertEquals('/v3/football/transfers/latest', $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_transfers_by_team_id()
    {
        $teamId = 3736;
        $url = FootballApi::transfers()->byTeamId($teamId)->url->getPath();
        $this->assertEquals("/v3/football/transfers/teams/$teamId", $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_transfers_by_date_range()
    {
        $from = '2021-12-27';
        $to = '2021-12-30';
        $url = FootballApi::transfers()->byDateRange($from, $to)->url->getPath();
        $this->assertEquals("/v3/football/transfers/between/$from/$to", $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_transfers_by_player_id()
    {
        $playerId = 35659846;
        $url = FootballApi::transfers()->byPlayerId($playerId)->url->getPath();
        $this->assertEquals("/v3/football/transfers/players/$playerId", $url);
    }
}
