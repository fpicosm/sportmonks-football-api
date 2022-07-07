<?php

namespace Requests;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApi;
use TestCase;

class RoundTest extends TestCase
{
    const ID = 201963;

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
    public function it_retrieves_standings()
    {
        $data = FootballApi::rounds(self::ID)->standings();
        $this->assertNotEmpty($data->data);
    }
}
