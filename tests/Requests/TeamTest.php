<?php

namespace Requests;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApi;
use TestCase;

class TeamTest extends TestCase
{
    const ID = 1;
    const NAME = 'West';

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_all_teams()
    {
        $data = FootballApi::teams()->all();
        $this->assertNotEmpty($data->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_a_team()
    {
        $data = FootballApi::teams()->byId(self::ID);
        $this->assertNotEmpty($data->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_the_teams_by_search()
    {
        $data = FootballApi::teams()->search(self::NAME);
        $this->assertNotEmpty($data->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_the_leagues_by_team()
    {
        $data = FootballApi::teams(self::ID)->leagues();
        $this->assertNotEmpty($data->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_the_current_leagues_by_team()
    {
        $data = FootballApi::teams(self::ID)->currentLeagues();
        $this->assertNotEmpty($data->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_the_current_squad()
    {
        $data = FootballApi::teams(self::ID)->squad();
        $this->assertNotEmpty($data->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_the_fixtures_by_date_range()
    {
        $data = FootballApi::teams(self::ID)->fixturesByDateRange('2021-10-01', '2022-01-01');
        $this->assertNotEmpty($data->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_the_head_to_head()
    {
        $data = FootballApi::teams(self::ID)->headToHead(2);
        $this->assertNotEmpty($data->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_the_transfers()
    {
        $data = FootballApi::teams(self::ID)->transfers();
        $this->assertNotEmpty($data->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_the_rivals()
    {
        $data = FootballApi::teams(self::ID)->rivals();
        $this->assertNotEmpty($data->data);
    }
}
