<?php

namespace Requests;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApi;
use TestCase;

class SeasonTest extends TestCase
{
    const ID = 19734;

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_all_seasons()
    {
        $data = FootballApi::seasons()->all();
        $this->assertNotEmpty($data->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_a_season()
    {
        $data = FootballApi::seasons()->byId(self::ID);
        $this->assertNotEmpty($data->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_rounds_by_season()
    {
        $data = FootballApi::seasons(self::ID)->rounds();
        $this->assertNotEmpty($data->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_stages_by_season()
    {
        $data = FootballApi::seasons(self::ID)->stages();
        $this->assertNotEmpty($data->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_teams_by_season()
    {
        $data = FootballApi::seasons(SeasonTest::ID)->teams();
        $this->assertNotEmpty($data->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_a_team_squad()
    {
        $data = FootballApi::seasons(self::ID)->teamSquad(TeamTest::ID);
        $this->assertNotEmpty($data->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_venues_by_season()
    {
        $data = FootballApi::seasons(self::ID)->venues();
        $this->assertNotEmpty($data->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_standings()
    {
        $data = FootballApi::seasons(self::ID)->standings();
        $this->assertNotEmpty($data->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_standing_corrections()
    {
        $data = FootballApi::seasons(self::ID)->standingCorrections();
        $this->assertNotEmpty($data->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_schedules()
    {
        $data = FootballApi::seasons(self::ID)->schedules();
        $this->assertNotEmpty($data->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_team_schedules()
    {
        $data = FootballApi::seasons(self::ID)->teamSchedule(TeamTest::ID);
        $this->assertNotEmpty($data->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_top_scorers()
    {
        $data = FootballApi::seasons(self::ID)->topScorers();
        $this->assertObjectHasAttribute('data', $data);
        $this->assertIsArray($data->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_top_scorers_aggregated()
    {
        $data = FootballApi::seasons(self::ID)->topScorersAggregated();
        $this->assertObjectHasAttribute('data', $data);
        $this->assertIsArray($data->data);
    }
}
