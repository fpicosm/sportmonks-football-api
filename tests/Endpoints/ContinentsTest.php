<?php

namespace Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApi;
use TestCase;

class ContinentsTest extends TestCase
{
    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_all_continents ()
    {
        $data = FootballApi::continents()->all()->data;

        $this->assertIsArray($data);
        $this->assertNotEmpty($data);

        $this->assertIsObject($data[0]);
        $this->assertEquals('Europe', $data[0]->name);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_a_continent ()
    {
        $data = FootballApi::continents()->find(1)->data;

        $this->assertIsObject($data);
        $this->assertNotEmpty($data);

        $this->assertEquals('Europe', $data->name);
    }
}
