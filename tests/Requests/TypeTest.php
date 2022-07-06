<?php

namespace Requests;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApi;
use TestCase;

class RegionTest extends TestCase
{
    const ID = 47;
    const NAME = 'England';

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_all_regions()
    {
        $data = FootballApi::regions()->all();
        $this->assertNotEmpty($data->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_a_region()
    {
        $data = FootballApi::regions()->byId(self::ID);
        $this->assertNotEmpty($data->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_searches_a_region()
    {
        $data = FootballApi::regions()->search(self::NAME);
        $this->assertNotEmpty($data->data);
    }
}
