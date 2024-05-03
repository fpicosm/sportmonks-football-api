<?php

namespace Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApi;
use TestCase;

class RegionsTest extends TestCase
{
    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_all_regions()
    {
        $response = FootballApi::regions()->all();
        $this->assertEquals('/v3/core/regions', $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_one_region()
    {
        $id = 1;

        $response = FootballApi::regions()->find($id);
        $this->assertEquals("/v3/core/regions/$id", $response->url->getPath());
        $this->assertIsObject($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_regions_search()
    {
        $name = 'Madrid';

        $response = FootballApi::regions()->search($name);
        $this->assertEquals("/v3/core/regions/search/$name", $response->url->getPath());
        $this->assertIsArray($response->data);
    }
}
