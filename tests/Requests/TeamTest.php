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
    public function it_retrieves_the_teams_from_a_country()
    {
        $data = FootballApi::teams()->byCountry(CountryTest::ID);
        $this->assertNotEmpty($data->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_the_teams_from_a_season()
    {
        $data = FootballApi::teams()->bySeason(SeasonTest::ID);
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
}
