<?php

namespace Requests;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApi;
use TestCase;

class StageTest extends TestCase
{
    const ID = 77457864;

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_all_stages()
    {
        $data = FootballApi::stages()->all();
        $this->assertNotEmpty($data->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_a_stage()
    {
        $data = FootballApi::stages()->byId(self::ID);
        $this->assertNotEmpty($data->data);
    }
}
