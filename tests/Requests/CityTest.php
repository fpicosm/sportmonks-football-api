<?php

namespace Requests;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApi;
use TestCase;

class CityTest extends TestCase
{
    const ID = 51662;
    const NAME = 'London';

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_all_cities()
    {
        $data = FootballApi::cities()->all();
        $this->assertObjectHasAttribute('data', $data);
        $this->assertIsArray($data->data);
        $this->assertNotEmpty($data->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_with_includes_option()
    {
        $includes = ['region'];
        collect($includes)->each(function (string $include) {
            $data = FootballApi::cities()->all(['include' => $include]);
            $this->assertObjectHasAttribute('data', $data);
            $this->assertIsArray($data->data);
            $city = $data->data[0];
            $this->assertObjectHasAttribute($include, $city);
        });
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_a_city()
    {
        $data = FootballApi::cities()->byId(self::ID);
        $this->assertNotEmpty($data->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_searches_a_city()
    {
        $data = FootballApi::cities()->search(self::NAME);
        $this->assertNotEmpty($data->data);
    }
}
