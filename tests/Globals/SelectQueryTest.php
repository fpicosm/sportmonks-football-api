<?php

namespace Globals;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\ServerException;
use Sportmonks\FootballApi\FootballApi;
use TestCase;

class SelectQueryTest extends TestCase
{
    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_select_field()
    {
        $data = FootballApi::cities()->all();

        $city = $data->data[0];
        $this->assertObjectHasAttribute('latitude', $city);

        $data = FootballApi::cities()->all(['select' => 'name']);
        $city = $data->data[0];
        $this->assertObjectNotHasAttribute('latitude', $city);

        $data = FootballApi::cities()->all(['select' => 'name,latitude']);
        $city = $data->data[0];
        $this->assertObjectHasAttribute('latitude', $city);

        $data = FootballApi::cities()->all(['select' => ['name', 'latitude']]);
        $city = $data->data[0];
        $this->assertObjectHasAttribute('latitude', $city);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_throws_an_exception_if_non_comma_separated()
    {
        $this->expectException(ServerException::class);
        FootballApi::cities()->all(['select' => 'name;latitude']);
    }
}
