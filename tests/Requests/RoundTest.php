<?php

namespace Requests;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApi;
use TestCase;

class RoundTest extends TestCase
{
    const ID = 274668;

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_all_rounds()
    {
        $data = FootballApi::rounds()->all();
        $this->assertNotEmpty($data->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_a_round()
    {
        $data = FootballApi::rounds()->byId(self::ID);
        $this->assertNotEmpty($data->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_the_rounds_from_a_season()
    {
        $data = FootballApi::rounds()->bySeason(SeasonTest::ID);
        $this->assertNotEmpty($data->data);
    }
}
