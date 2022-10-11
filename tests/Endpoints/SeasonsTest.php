<?php

namespace Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApi;
use TestCase;
use TypeError;

class SeasonsTest extends TestCase
{
    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_all_seasons ()
    {
        $data = FootballApi::seasons()->all()->data;

        $this->assertIsArray($data);
        $this->assertNotEmpty($data);
        $this->assertIsObject($data[0]);
        $this->assertObjectHasAttribute('league_id', $data[0]);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_a_seasons ()
    {
        $data = FootballApi::seasons()->find(19799)->data;

        $this->assertIsObject($data);
        $this->assertNotEmpty($data);
        $this->assertEquals(564, $data->league_id);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_a_season_news ()
    {
        $data = FootballApi::seasons(19799)->news()->data;
        $this->assertIsArray($data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_a_season_rounds ()
    {
        $data = FootballApi::seasons(19799)->rounds()->data;

        $this->assertIsArray($data);
        $this->assertCount(38, $data);
        $this->assertIsObject($data[0]);
        $this->assertEquals(1, $data[0]->name);
        $this->assertEquals(275883, $data[0]->id);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_a_season_stages ()
    {
        $data = FootballApi::seasons(19799)->stages()->data;

        $this->assertIsArray($data);
        $this->assertCount(1, $data);
        $this->assertIsObject($data[0]);
        $this->assertEquals('Regular Season', $data[0]->name);
        $this->assertEquals(77458033, $data[0]->id);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_a_season_standings ()
    {
        $data = FootballApi::seasons(19799)->standings()->data;

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
        $data = FootballApi::seasons(19799)->standingsByDate('2022-10-01')->data;

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
    public function it_returns_a_season_standings_correction ()
    {
        $data = FootballApi::seasons(19799)->standingsCorrection()->data;

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
    public function it_returns_a_season_teams ()
    {
        $data = FootballApi::seasons(19799)->teams()->data;

        $this->assertIsArray($data);
        $this->assertCount(20, $data);
        $this->assertIsObject($data[0]);
        $this->assertEquals('Celta de Vigo', $data[0]->name);
        $this->assertEquals(36, $data[0]->id);

        $this->expectException(TypeError::class);
        FootballApi::seasons()->teams(19799);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_the_squad_for_a_season_and_team ()
    {
        $data = FootballApi::seasons(19799)->squad(83)->data;

        $this->assertIsArray($data);
        $this->assertNotEmpty($data);

        $this->assertIsObject(collect($data)->firstWhere('player_id', 31000));

        $this->expectException(TypeError::class);
        FootballApi::seasons()->squad(19799, 83);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_a_season_topscorers ()
    {
        $data = FootballApi::seasons(19799)->topscorers()->data;

        $this->assertIsObject($data);
        $this->assertObjectHasAttribute('goalscorers', $data);
        $this->assertNotEmpty($data->goalscorers->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_a_season_aggregated_topscorers ()
    {
        $data = FootballApi::seasons(19799)->topscorers(true)->data;

        $this->assertIsObject($data);
        $this->assertObjectHasAttribute('aggregatedGoalscorers', $data);
        $this->assertNotEmpty($data->aggregatedGoalscorers->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_a_season_venues ()
    {
        $data = FootballApi::seasons(19799)->venues()->data;

        $this->assertIsArray($data);
        $this->assertCount(20, $data);
        $this->assertIsObject($data[0]);
        $this->assertEquals('Estadio de Balaídos', $data[0]->name);

        $this->expectException(TypeError::class);
        FootballApi::seasons()->venues(19799, 83);
    }
}
