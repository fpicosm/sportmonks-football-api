<?php

namespace Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApi;
use TestCase;

class LeaguesTest extends TestCase
{
    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_all_leagues ()
    {
        $data = FootballApi::leagues()->all()->data;

        $this->assertIsArray($data);
        $this->assertNotEmpty($data);

        $league = collect($data)->firstWhere('id', 8);
        $this->assertEquals('Premier League', $league->name);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_a_league ()
    {
        $data = FootballApi::leagues()->byId(564)->data;

        $this->assertIsObject($data);
        $this->assertNotEmpty($data);
        $this->assertEquals('La Liga', $data->name);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_a_leagues_search ()
    {
        $data = FootballApi::leagues()->search('La Liga')->data;

        $this->assertIsArray($data);
        $this->assertNotEmpty($data);

        $league = collect($data)->firstWhere('id', 564);
        $this->assertIsObject($league);
    }
}
