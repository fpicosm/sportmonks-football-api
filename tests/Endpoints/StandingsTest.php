<?php

namespace Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApi;
use TestCase;

class StandingsTest extends TestCase
{
    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_a_round_standings ()
    {
        $data = FootballApi::standings()->byRound(19799, 275883)->data;

        $this->assertIsArray($data);
        $this->assertCount(20, $data);
        $this->assertIsObject($data[0]);
        $this->assertObjectHasAttribute('position', $data[0]);
        $this->assertObjectHasAttribute('overall', $data[0]);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_a_season_standings ()
    {
        $data = FootballApi::standings()->bySeason(19799)->data;

        $this->assertIsArray($data);
        $this->assertCount(1, $data);
        $this->assertIsObject($data[0]);
        $this->assertEquals('Regular Season', $data[0]->name);
        $this->assertObjectHasAttribute('standings', $data[0]);
        $this->assertIsArray($data[0]->standings->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_a_season_standings_for_a_date ()
    {
        $data = FootballApi::standings()->bySeasonAndDate(19799, '2022-10-01')->data;

        $this->assertIsArray($data);
        $this->assertCount(20, $data);
        $this->assertIsObject($data[0]);
        $this->assertObjectHasAttribute('position', $data[0]);
        $this->assertObjectHasAttribute('overall', $data[0]);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_a_season_correction_standings ()
    {
        $data = FootballApi::standings()->correctionsBySeason(19799)->data;

        $this->assertIsArray($data);
        $this->assertCount(1, $data);
        $this->assertIsObject($data[0]);
        $this->assertEquals('Regular Season', $data[0]->name);
        $this->assertObjectHasAttribute('corrections', $data[0]);
        $this->assertIsArray($data[0]->corrections->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_a_season_live_standings ()
    {
        $data = FootballApi::standings()->liveBySeason(19799)->data;

        $this->assertIsArray($data);
        $this->assertCount(1, $data);
        $this->assertIsObject($data[0]);
        $this->assertEquals('Regular Season', $data[0]->name);
        $this->assertObjectHasAttribute('standings', $data[0]);
    }
}
