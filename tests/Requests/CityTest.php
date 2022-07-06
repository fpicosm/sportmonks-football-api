<?php

namespace Requests;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApi;
use TestCase;

class CityTest extends TestCase
{
    const ID = 51662;
    const NAME = 'London';

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_all_cities()
    {
        $data = FootballApi::cities()->all();
        $this->assertNotEmpty($data->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_a_city()
    {
        $data = FootballApi::cities()->byId(self::ID);
        $this->assertNotEmpty($data->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_searches_a_city()
    {
        $data = FootballApi::cities()->search(self::NAME);
        $this->assertNotEmpty($data->data);
    }
}
