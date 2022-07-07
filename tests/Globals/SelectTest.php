<?php

namespace Globals;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\ServerException;
use Sportmonks\FootballApi\FootballApi;
use TestCase;

class SelectTest extends TestCase
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

        $data = FootballApi::cities()->select('name')->all();
        $city = $data->data[0];
        $this->assertObjectNotHasAttribute('latitude', $city);

        $data = FootballApi::cities()->select('name,latitude')->all();
        $city = $data->data[0];
        $this->assertObjectHasAttribute('latitude', $city);

        $data = FootballApi::cities()->select(['name', 'latitude'])->all();
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
        FootballApi::cities()->select('name;latitude')->all();
    }
}
