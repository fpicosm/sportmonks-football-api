<?php

namespace Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApi;
use TestCase;
use TypeError;

class CountriesTest extends TestCase
{
    const ID = 2;

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_all_countries ()
    {
        $data = FootballApi::countries()->all()->data;

        $this->assertIsArray($data);
        $this->assertNotEmpty($data);

        $this->assertIsObject($data[0]);
        $this->assertEquals('Poland', $data[0]->name);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_a_country ()
    {
        $data = FootballApi::countries()->find(2)->data;

        $this->assertIsObject($data);
        $this->assertNotEmpty($data);
        $this->assertEquals('Poland', $data->name);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_a_country_leagues ()
    {
        $data = FootballApi::countries(462)->leagues()->data;

        $this->assertIsArray($data);
        $this->assertNotEmpty($data);

        $this->assertEquals('Premier League', $data[0]->name);

        $this->expectException(TypeError::class);
        FootballApi::countries()->leagues(462);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_a_country_players ()
    {
        $data = FootballApi::countries(320)->players()->data;

        $this->assertIsArray($data);
        $this->assertNotEmpty($data);

        $this->assertEquals('Nicklas Bendtner', $data[0]->fullname);

        $this->expectException(TypeError::class);
        FootballApi::countries()->players(320);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_a_country_teams ()
    {
        $data = FootballApi::countries(320)->teams()->data;

        $this->assertIsArray($data);
        $this->assertNotEmpty($data);

        $this->assertEquals('København', $data[0]->name);

        $this->expectException(TypeError::class);
        FootballApi::countries()->teams(320);
    }
}
