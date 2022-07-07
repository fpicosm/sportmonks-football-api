<?php

namespace Requests;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApi;
use TestCase;

class VenueTest extends TestCase
{
    const ID = 206;

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_all_venues()
    {
        $data = FootballApi::venues()->all();
        $this->assertNotEmpty($data->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_a_venue()
    {
        $data = FootballApi::venues()->byId(self::ID);
        $this->assertNotEmpty($data->data);
    }
}
