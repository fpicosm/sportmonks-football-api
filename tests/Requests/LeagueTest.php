<?php

namespace Requests;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApi;
use TestCase;

class LeagueTest extends TestCase
{
    const ID = 8;
    const NAME = 'Premier';

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_all_leagues()
    {
        $data = FootballApi::leagues()->all();
        $this->assertNotEmpty($data->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_a_league()
    {
        $data = FootballApi::leagues()->byId(self::ID);
        $this->assertNotEmpty($data->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_live_leagues()
    {
        $data = FootballApi::leagues()->live();
        $this->assertNotEmpty($data->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_leagues_by_date()
    {
        $data = FootballApi::leagues()->byDate('2021-10-01');
        $this->assertNotEmpty($data->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_leagues_by_search()
    {
        $data = FootballApi::leagues()->search(self::NAME);
        $this->assertNotEmpty($data->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_transfers()
    {
        $data = FootballApi::leagues(self::ID)->transfers();
        $this->assertObjectHasAttribute('data', $data);
        $this->assertIsArray($data->data);
    }
}
