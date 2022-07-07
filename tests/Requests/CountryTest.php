<?php

namespace Requests;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApi;
use TestCase;

class CountryTest extends TestCase
{
    const ID = 462;
    const NAME = 'United Kingdom';

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_all_countries()
    {
        $data = FootballApi::countries()->all();
        $this->assertNotEmpty($data->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_a_country()
    {
        $data = FootballApi::countries()->byId(self::ID);
        $this->assertNotEmpty($data->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_searches_a_country()
    {
        $data = FootballApi::countries()->search(self::NAME);
        $this->assertNotEmpty($data->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_leagues_by_country()
    {
        $data = FootballApi::countries(CountryTest::ID)->leagues();
        $this->assertNotEmpty($data->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_players_by_country()
    {
        $data = FootballApi::countries(CountryTest::ID)->players();
        $this->assertNotEmpty($data->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_teams_by_country()
    {
        $data = FootballApi::countries(CountryTest::ID)->teams();
        $this->assertNotEmpty($data->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_coaches_by_country()
    {
        $data = FootballApi::countries(CountryTest::ID)->coaches();
        $this->assertNotEmpty($data->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_referees_by_country()
    {
        $data = FootballApi::countries(CountryTest::ID)->referees();
        $this->assertNotEmpty($data->data);
    }
}
