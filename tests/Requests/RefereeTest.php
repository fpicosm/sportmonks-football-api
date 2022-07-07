<?php

namespace Requests;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApi;
use TestCase;

class RefereeTest extends TestCase
{
    const ID = 25;
    const NAME = 'Clattenburg';

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_all_referees()
    {
        $data = FootballApi::referees()->all();
        $this->assertNotEmpty($data->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_a_referee()
    {
        $data = FootballApi::referees()->byId(self::ID);
        $this->assertNotEmpty($data->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_the_referees_by_search()
    {
        $data = FootballApi::referees()->search(self::NAME);
        $this->assertNotEmpty($data->data);
    }


    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_the_last_updated_referees()
    {
        $data = FootballApi::referees()->lastUpdated();
        $this->assertNotEmpty($data->data);
    }
}
