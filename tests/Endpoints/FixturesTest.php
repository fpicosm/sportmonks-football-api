<?php

namespace Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApi;
use TestCase;
use TypeError;

class FixturesTest extends TestCase
{
    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_a_fixture ()
    {
        $data = FootballApi::fixtures()->find(16475287)->data;

        $this->assertIsObject($data);
        $this->assertNotEmpty($data);
        $this->assertEquals('17141', $data->season_id);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_last_updated_fixtures ()
    {
        $data = FootballApi::fixtures()->lastUpdated()->data;

        $this->assertIsArray($data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_fixtures_by_date ()
    {
        $date = '2021-08-04';
        $data = FootballApi::fixtures()->byDate($date)->data;

        $this->assertIsArray($data);
        $this->assertEquals(18244931, $data[0]->id);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_fixtures_by_date_range ()
    {
        $startDate = '2021-08-04';
        $endDate = '2021-08-11';
        $data = FootballApi::fixtures()->byDateRange($startDate, $endDate)->data;

        $this->assertIsArray($data);
        $this->assertEquals(18244931, $data[0]->id);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_fixtures_by_date_range_for_a_team ()
    {
        $startDate = '2021-08-04';
        $endDate = '2021-09-04';
        $teamId = 9;
        $data = FootballApi::fixtures()->byDateRangeForTeam($startDate, $endDate, $teamId)->data;

        $this->assertIsArray($data);
        $this->assertEquals(18138611, $data[0]->id);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_multiple_fixtures ()
    {
        $list = '16475287,16475288';
        $data = FootballApi::fixtures()->multiple($list)->data;

        $this->assertIsArray($data);
        $this->assertCount(2, $data);
        $this->assertEquals(17141, $data[0]->season_id);
        $this->assertEquals(16475287, $data[0]->id);
        $this->assertEquals(16475288, $data[1]->id);

        $list = [ 16475287, 16475288 ];
        $data = FootballApi::fixtures()->multiple($list)->data;

        $this->assertIsArray($data);
        $this->assertCount(2, $data);
        $this->assertEquals(16475287, $data[0]->id);
        $this->assertEquals(16475288, $data[1]->id);

        $list = '16475287;16475288';
        $data = FootballApi::fixtures()->multiple($list)->data;

        $this->assertIsArray($data);
        $this->assertCount(1, $data);
        $this->assertEquals(16475287, $data[0]->id);
        $this->assertArrayNotHasKey(1, $data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_deleted_fixtures ()
    {
        $data = FootballApi::fixtures()->deleted()->data;
        $this->assertIsArray($data);
        $this->assertObjectHasAttribute('season_id', $data[0]);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_a_fixture_bookmakers ()
    {
        $data = FootballApi::fixtures(16475287)->bookmakers()->data;
        $this->assertIsArray($data);
        $this->assertEquals('10Bet', $data[0]->name);

        $this->expectException(TypeError::class);
        FootballApi::fixtures()->bookmakers(16475287);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_a_fixture_commentaries ()
    {
        $data = FootballApi::fixtures(16475287)->commentaries()->data;
        $this->assertIsArray($data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_a_fixture_highlights ()
    {
        $data = FootballApi::fixtures(16475287)->highlights()->data;
        $this->assertIsArray($data);
        $this->assertEquals('video', $data[0]->type);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_a_fixture_tv_stations ()
    {
        $data = FootballApi::fixtures(16475287)->tvStations()->data;
        $this->assertIsArray($data);
        $this->assertEquals('bet365', $data[0]->tvstation);
    }
}
