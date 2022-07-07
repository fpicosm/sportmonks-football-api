<?php

namespace Requests;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApi;
use TestCase;

class StandingTest extends TestCase
{
    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_all_standings()
    {
        $data = FootballApi::standings()->all();
        $this->assertNotEmpty($data->data);
    }
}
