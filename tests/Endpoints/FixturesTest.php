<?php

namespace Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApi;
use TestCase;

class FixturesTest extends TestCase
{
    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_all_fixtures()
    {
        $response = FootballApi::fixtures()->all();
        $this->assertEquals('/v3/football/fixtures', $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_one_fixture()
    {
        $id = 463;

        $response = FootballApi::fixtures()->find($id);
        $this->assertEquals("/v3/football/fixtures/$id", $response->url->getPath());
        $this->assertIsObject($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_multiple_fixtures()
    {
        $first = 463;
        $second = 464;

        $response = FootballApi::fixtures()->multiples("$first,$second");
        $this->assertEquals("/v3/football/fixtures/multi/$first,$second", $response->url->getPath());
        $this->assertIsArray($response->data);

        $response = FootballApi::fixtures()->multiples([$first, $second]);
        $this->assertEquals("/v3/football/fixtures/multi/$first,$second", $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_fixtures_by_date()
    {
        $date = '2010-08-14';

        $response = FootballApi::fixtures()->byDate($date);
        $this->assertEquals("/v3/football/fixtures/date/$date", $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_fixtures_by_date_range()
    {
        $from = '2010-08-13';
        $to = '2010-08-15';

        $response = FootballApi::fixtures()->byDateRange($from, $to);
        $this->assertEquals("/v3/football/fixtures/between/$from/$to", $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_fixtures_by_date_range_for_team()
    {
        $from = '2010-08-13';
        $to = '2010-08-15';
        $teamId = 6;

        $response = FootballApi::fixtures()->byDateRangeForTeam($from, $to, $teamId);
        $this->assertEquals("/v3/football/fixtures/between/$from/$to/$teamId", $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_head_to_head()
    {
        $teamId = 6;
        $opponentId = 9;

        $response = FootballApi::fixtures()->headToHead($teamId, $opponentId);
        $this->assertEquals("/v3/football/fixtures/head-to-head/$teamId/$opponentId", $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_search_fixtures_by_team_name()
    {
        $name = 'Tottenham';

        $response = FootballApi::fixtures()->search($name);
        $this->assertEquals("/v3/football/fixtures/search/$name", $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_tv_stations_by_fixture_id()
    {
        $fixtureId = 463;

        $response = FootballApi::fixtures($fixtureId)->tvStations();
        $this->assertEquals("/v3/football/tv-stations/fixtures/$fixtureId", $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_predictions_by_fixture_id()
    {
        $fixtureId = 463;

        $response = FootballApi::fixtures($fixtureId)->predictions();
        $this->assertEquals("/v3/football/predictions/probabilities/fixtures/$fixtureId", $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_bookmakers_by_fixture_id()
    {
        $fixtureId = 18528479;

        $response = FootballApi::fixtures($fixtureId)->bookmakers();
        $this->assertEquals("/v3/odds/bookmakers/fixtures/$fixtureId", $response->url->getPath());
        $this->assertIsArray($response->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_commentaries_by_fixture_id()
    {
        $fixtureId = 463;

        $response = FootballApi::fixtures($fixtureId)->commentaries();
        $this->assertEquals("/v3/football/commentaries/fixtures/$fixtureId", $response->url->getPath());
        $this->assertIsArray($response->data);
    }
}
