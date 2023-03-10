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
    public function it_returns_all_cities ()
    {
        $url = FootballApi::cities()->all()->url->getPath();
        $this->assertEquals('/v3/core/cities', $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_one_city ()
    {
        $id = 1;
        $url = FootballApi::cities()->byId($id)->url->getPath();
        $this->assertEquals("/v3/core/cities/$id", $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_cities_search ()
    {
        $name = 'Lon';
        $url = FootballApi::cities()->search($name)->url->getPath();
        $this->assertEquals("/v3/core/cities/search/$name", $url);
    }
}
