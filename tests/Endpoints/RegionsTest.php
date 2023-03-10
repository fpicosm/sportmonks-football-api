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
    public function it_returns_all_cities ()
    {
        $url = FootballApi::regions()->all()->url->getPath();
        $this->assertEquals('/v3/core/regions', $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_one_region ()
    {
        $id = 367;
        $url = FootballApi::regions()->byId($id)->url->getPath();
        $this->assertEquals("/v3/core/regions/$id", $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_regions_search ()
    {
        $name = 'Br';
        $url = FootballApi::regions()->search($name)->url->getPath();
        $this->assertEquals("/v3/core/regions/search/$name", $url);
    }
}