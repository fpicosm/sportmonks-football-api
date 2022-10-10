<?php

namespace Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApi;
use TestCase;

class BookmakersTest extends TestCase
{
    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_all_bookmakers ()
    {
        $data = FootballApi::bookmakers()->all()->data;

        $this->assertIsArray($data);
        $this->assertNotEmpty($data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_a_bookmaker ()
    {
        $data = FootballApi::bookmakers()->find(1)->data;

        $this->assertIsObject($data);
        $this->assertNotEmpty($data);
        $this->assertEquals('10Bet', $data->name);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_bookmakers_by_fixture ()
    {
        $data = FootballApi::bookmakers()->byFixture(16475287)->data;

        $this->assertIsArray($data);
        $this->assertNotEmpty($data);

        $this->assertEquals('10Bet', $data[0]->name);
    }
}
