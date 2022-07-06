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

        $firstId = self::ID;
        $secondId = self::ID + 1;
        $data = FootballApi::fixtures()->byIds("{$firstId},{$secondId}");
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
        $this->assertNotEmpty($data->data);
    }
}
