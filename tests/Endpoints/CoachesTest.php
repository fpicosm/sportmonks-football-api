<?php

namespace Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApi;
use TestCase;

class CoachesTest extends TestCase
{
    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_a_coach ()
    {
        $data = FootballApi::coaches()->find(1467946)->data;

        $this->assertIsObject($data);
        $this->assertNotEmpty($data);

        $this->assertEquals('Neil Lennon', $data->fullname);
    }
}
