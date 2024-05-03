<?php

namespace Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApi;
use TestCase;

class TypesTest extends TestCase
{
    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_all_types()
    {
        $response = FootballApi::types()->all();
        $this->assertEquals('/v3/core/types', $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_one_type()
    {
        $id = 1;

        $response = FootballApi::types()->find($id);
        $this->assertEquals("/v3/core/types/$id", $response->url->getPath());
        $this->assertIsObject($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_types_by_entities()
    {
        $response = FootballApi::types()->byEntities();
        $this->assertEquals("/v3/core/types/entities", $response->url->getPath());
        $this->assertIsObject($response->data);
        collect($response->data)->every(function ($value, $key) {
            $this->assertIsString($key);
            $this->assertIsObject($value);
            $this->assertIsArray($value->types);
        });
    }
}
