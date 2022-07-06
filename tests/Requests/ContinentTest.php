<?php

namespace Requests;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApi;
use TestCase;

class ContinentTest extends TestCase
{
    const ID = 1;

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_all_continents()
    {
        $data = FootballApi::continents()->all();
        $this->assertNotEmpty($data->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_a_continent()
    {
        $data = FootballApi::continents()->byId(self::ID);
        $this->assertNotEmpty($data->data);
    }
}
