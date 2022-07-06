<?php

namespace Requests;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApi;
use TestCase;

class ContinentTest extends TestCase
{
    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_continents()
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
        $data = FootballApi::continents()->byId(1);
        $this->assertNotEmpty($data->data);
    }
}
