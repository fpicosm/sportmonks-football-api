<?php

namespace Requests;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApi;
use TestCase;

class PlayerTest extends TestCase
{
    const ID = 154421;
    const NAME = 'Haaland';

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_all_players()
    {
        $data = FootballApi::players()->all();
        $this->assertNotEmpty($data->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_a_player()
    {
        $data = FootballApi::players()->byId(self::ID);
        $this->assertNotEmpty($data->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_players_by_country()
    {
        $data = FootballApi::players()->byCountry(CountryTest::ID);
        $this->assertNotEmpty($data->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_the_players_by_search()
    {
        $data = FootballApi::players()->search(self::NAME);
        $this->assertNotEmpty($data->data);
    }


    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_the_last_updated_players()
    {
        $data = FootballApi::players()->lastUpdated();
        $this->assertNotEmpty($data->data);
    }
}
