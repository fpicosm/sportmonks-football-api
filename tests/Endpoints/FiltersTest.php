<?php

namespace Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApi;
use TestCase;

class FiltersTest extends TestCase
{
    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_my_filters()
    {
        $response = FootballApi::filters()->all();
        $this->assertEquals('/v3/my/filters/entity', $response->url->getPath());
        $this->assertIsObject($response->data);

        collect($response->data)->every(function ($value, $key) {
            $this->assertIsString($key);
            $this->assertIsArray($value);
        });
    }
}
