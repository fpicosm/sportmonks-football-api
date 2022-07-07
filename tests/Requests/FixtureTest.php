<?php

namespace Requests;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApi;
use TestCase;

class FixtureTest extends TestCase
{
    const ID = 18138603;

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_all_fixtures()
    {
        $data = FootballApi::fixtures()->all();
        $this->assertNotEmpty($data->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_a_fixture()
    {
        $data = FootballApi::fixtures()->byId(self::ID);
        $this->assertNotEmpty($data->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_multiple_fixtures()
    {
        $ids = [self::ID, (self::ID + 1)];
        $data = FootballApi::fixtures()->byIds($ids);
        $this->assertNotEmpty($data->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_fixtures_by_date_range()
    {
        $data = FootballApi::fixtures()->byDateRange('2021-10-01', '2021-11-01');
        $this->assertNotEmpty($data->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_fixtures_by_date()
    {
        $data = FootballApi::fixtures()->byDate('2021-10-01');
        $this->assertNotEmpty($data->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_last_updated_fixtures()
    {
        $data = FootballApi::fixtures()->lastUpdated();
        $this->assertObjectHasAttribute('data', $data);
        $this->assertIsArray($data->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_tv_stations()
    {
        $data = FootballApi::fixtures(self::ID)->tvStations();
        $this->assertObjectHasAttribute('data', $data);
        $this->assertIsArray($data->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_commentaries()
    {
        $data = FootballApi::fixtures(self::ID)->commentaries();
        $this->assertIsArray($data->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_highlights()
    {
        $data = FootballApi::fixtures(self::ID)->highlights();
        $this->assertIsArray($data->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_predictions()
    {
        $data = FootballApi::fixtures(self::ID)->predictions();
        $this->assertIsArray($data->data);
    }
}
