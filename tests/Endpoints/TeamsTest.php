<?php

namespace Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApi;
use TestCase;
use TypeError;

class TeamsTest extends TestCase
{
    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_a_team ()
    {
        $data = FootballApi::teams()->find(36)->data;

        $this->assertIsObject($data);
        $this->assertNotEmpty($data);
        $this->assertEquals("Celta de Vigo", $data->name);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_a_country_teams ()
    {
        $data = FootballApi::teams()->byCountry(32)->data;

        $this->assertIsArray($data);
        $this->assertNotEmpty($data);

        $team = collect($data)->firstWhere('id', 36);
        $this->assertIsObject($team);
        $this->assertEquals("Celta de Vigo", $team->name);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_a_season_teams ()
    {
        $data = FootballApi::teams()->bySeason(19799)->data;

        $this->assertIsArray($data);
        $this->assertCount(20, $data);

        $team = collect($data)->firstWhere('id', 36);
        $this->assertIsObject($team);
        $this->assertEquals("Celta de Vigo", $team->name);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_head_to_head_for_a_team ()
    {
        $data = FootballApi::teams(83)->headToHead(7980)->data;

        $this->assertIsArray($data);
        $this->assertNotEmpty($data);

        $this->expectException(TypeError::class);
        FootballApi::teams()->headToHead(83, 7980);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_current_leagues_for_a_team ()
    {
        $data = FootballApi::teams(83)->leagues()->data;

        $this->assertIsArray($data);
        $this->assertNotEmpty($data);
        $this->assertIsObject($data[0]);
        $this->assertObjectHasAttribute('league_id', $data[0]);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_all_leagues_for_a_team ()
    {
        $data = FootballApi::teams(83)->leagues(true)->data;

        $this->assertIsArray($data);
        $this->assertNotEmpty($data);
        $this->assertIsObject($data[0]);
        $this->assertObjectHasAttribute('league_id', $data[0]);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_a_team_rivals ()
    {
        $data = FootballApi::teams(83)->rivals()->data;

        $this->assertIsObject($data);
        $this->assertNotEmpty($data);
        $this->assertEquals('FC Barcelona', $data->name);
        $this->assertObjectHasAttribute('rivals', $data);
        $this->assertIsArray($data->rivals->data);
        $this->assertNotEmpty($data->rivals->data);

        $this->expectException(TypeError::class);
        FootballApi::teams()->rivals(83);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_a_teams_search ()
    {
        $data = FootballApi::teams()->search('Celta de Vigo')->data;

        $this->assertIsArray($data);
        $this->assertNotEmpty($data);

        $team = collect($data)->firstWhere('id', 36);
        $this->assertIsObject($team);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_the_squad_for_a_team_and_season ()
    {
        $data = FootballApi::teams(83)->squad(19799)->data;

        $this->assertIsArray($data);
        $this->assertNotEmpty($data);

        $this->assertIsObject(collect($data)->firstWhere('player_id', 31000));
    }
}
