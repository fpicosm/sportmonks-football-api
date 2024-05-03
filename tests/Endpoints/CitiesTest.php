<?php

namespace Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApi;
use TestCase;

class CitiesTest extends TestCase
{
    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_all_cities()
    {
        $response = FootballApi::cities()->all();
        $this->assertEquals('/v3/core/cities', $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_one_city()
    {
        $id = 1;

        $response = FootballApi::cities()->find($id);
        $this->assertEquals("/v3/core/cities/$id", $response->url->getPath());
        $this->assertIsObject($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_cities_search()
    {
        $name = 'London';

        $response = FootballApi::cities()->search($name);
        $this->assertEquals("/v3/core/cities/search/$name", $response->url->getPath());
        $this->assertIsArray($response->data);
    }
}
