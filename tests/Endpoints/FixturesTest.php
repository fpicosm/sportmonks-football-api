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
    public function it_returns_all_fixtures ()
    {
        $url = FootballApi::fixtures()->all()->url->getPath();
        $this->assertEquals('/v3/football/fixtures', $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_one_fixture ()
    {
        $id = 18528480;
        $url = FootballApi::fixtures()->byId($id)->url->getPath();
        $this->assertEquals("/v3/football/fixtures/$id", $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_multiple_fixtures ()
    {
        $first = 18528484;
        $second = 18531140;

        $url = FootballApi::fixtures()->byMultipleIds("$first,$second")->url->getPath();
        $this->assertEquals("/v3/football/fixtures/multi/$first,$second", $url);

        $url = FootballApi::fixtures()->byMultipleIds([ $first, $second ])->url->getPath();
        $this->assertEquals("/v3/football/fixtures/multi/$first,$second", $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_fixtures_by_date ()
    {
        $date = '2022-01-01';
        $url = FootballApi::fixtures()->byDate($date)->url->getPath();
        $this->assertEquals("/v3/football/fixtures/date/$date", $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_fixtures_by_date_range ()
    {
        $from = '2022-07-17';
        $to = '2022-07-25';
        $url = FootballApi::fixtures()->byDateRange($from, $to)->url->getPath();
        $this->assertEquals("/v3/football/fixtures/between/$from/$to", $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_fixtures_by_date_range_for_team ()
    {
        $from = '2022-07-17';
        $to = '2022-07-25';
        $teamId = 49;

        $url = FootballApi::fixtures()->byDateRangeForTeam($from, $to, $teamId)->url->getPath();
        $this->assertEquals("/v3/football/fixtures/between/$from/$to/$teamId", $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_head_to_head ()
    {
        $teamId = 2650;
        $opponentId = 86;
        $url = FootballApi::fixtures()->headToHead($teamId, $opponentId)->url->getPath();
        $this->assertEquals("/v3/football/fixtures/head-to-head/$teamId/$opponentId", $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_search_fixtures_by_team_name ()
    {
        $name = 'havn';
        $url = FootballApi::fixtures()->search('havn')->url->getPath();
        $this->assertEquals("/v3/football/fixtures/search/$name", $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_tv_stations_by_fixture_id ()
    {
        $fixtureId = 16808591;
        $url = FootballApi::fixtures($fixtureId)->tvStations()->url->getPath();
        $this->assertEquals("/v3/football/tv-stations/fixtures/$fixtureId", $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_predictions_by_fixture_id ()
    {
        $fixtureId = 16808591;
        $url = FootballApi::fixtures($fixtureId)->predictions()->url->getPath();
        $this->assertEquals("/v3/football/predictions/probabilities/fixtures/$fixtureId", $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_bookmakers_by_fixture_id ()
    {
        $fixtureId = 16808591;
        $url = FootballApi::fixtures($fixtureId)->bookmakers()->url->getPath();
        $this->assertEquals("/v3/odds/bookmakers/fixtures/$fixtureId", $url);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_commentaries_by_fixture_id ()
    {
        $fixtureId = 16808591;
        $url = FootballApi::fixtures($fixtureId)->commentaries()->url->getPath();
        $this->assertEquals("/v3/football/commentaries/fixtures/$fixtureId", $url);
    }
}
