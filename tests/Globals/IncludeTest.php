<?php

namespace Globals;

use ErrorException;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApi;
use TestCase;

class IncludeTest extends TestCase
{
    const VALID_OPTIONS = ['continent', 'leagues', 'regions'];

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_with_include_option()
    {
        $data = FootballApi::countries()->include('continent')->all();
        $this->assertObjectHasAttribute('data', $data);
        $this->assertIsArray($data->data);
        $country = $data->data[0];
        $this->assertObjectHasAttribute('continent', $country);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_allows_multiples_includes_as_array()
    {
        $data = FootballApi::countries()->include(['continent', 'leagues', 'regions'])->all();
        $this->assertObjectHasAttribute('data', $data);
        $this->assertIsArray($data->data);
        $country = $data->data[0];

        $this->assertObjectHasAttribute('continent', $country);
        $this->assertObjectHasAttribute('leagues', $country);
        $this->assertObjectHasAttribute('regions', $country);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_allows_multiples_includes_as_string_semicolon_separated()
    {

        $data = FootballApi::countries()->include('continent;leagues;regions')->all();
        $this->assertObjectHasAttribute('data', $data);
        $this->assertIsArray($data->data);
        $country = $data->data[0];

        $this->assertObjectHasAttribute('continent', $country);
        $this->assertObjectHasAttribute('leagues', $country);
        $this->assertObjectHasAttribute('regions', $country);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_throws_an_exception_if_non_semicolon_separated()
    {
        $this->expectException(ClientException::class);
        FootballApi::countries()->include('continent,leagues,regions')->all();
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_throws_an_exception_if_include_does_not_exist()
    {
        $this->expectException(ClientException::class);
        FootballApi::countries()->include('NOT_VALID_VALUE')->all();
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_allows_nested_includes()
    {
        $data = FootballApi::countries()->include(['continent', 'leagues', 'regions.cities'])->all();
        $this->assertObjectHasAttribute('data', $data);
        $this->assertIsArray($data->data);
        $country = $data->data[0];

        $this->assertObjectHasAttribute('continent', $country);
        $this->assertObjectHasAttribute('leagues', $country);
        $this->assertObjectHasAttribute('regions', $country);
        $this->assertIsArray($country->regions);

        $region = $country->regions[0];
        $this->assertObjectHasAttribute('cities', $region);
        $this->assertIsArray($region->cities);
    }

    /**
     * @todo
     * @test
     * @throws GuzzleException
     */
    public function it_allows_nested_multi_dimension_array_as_included()
    {
        $include = [
            'country',
            'seasons' => ['stages', 'sport'],
        ];

        $this->expectException(ErrorException::class);
        FootballApi::leagues()->include($include)->all();
    }
}
