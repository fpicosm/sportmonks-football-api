<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use InvalidArgumentException;
use Sportmonks\FootballApi\Clients\FootballClient;

class TvStations extends FootballClient
{
    /** @var int|null the id of the tv-station */
    protected ?int $id;

    /**
     * @param int|null $id the id of the tv-station
     */
    public function __construct(?int $id = null)
    {
        parent::__construct();
        $this->id = $id;
    }

    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/tv-stations/get-all-tv-stations Docs
     */
    public function all(array $query = []): object
    {
        return $this->call('tv-stations', $query);
    }

    /**
     * @param int $id the tv-station id
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/tv-stations/get-tv-station-by-id Docs
     */
    public function find(int $id, array $query = []): object
    {
        return $this->call("tv-stations/$id", $query);
    }

    /**
     * @param int $fixtureId the fixture id
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/tv-stations/get-tv-stations-by-fixture-id Docs
     */
    public function byFixture(int $fixtureId, array $query = []): object
    {
        return $this->call("tv-stations/fixtures/$fixtureId", $query);
    }

    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @see Fixtures::upcomingByTvStation
     */
    public function upcomingFixtures(array $query = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No tv_station_id set');
        return (new Fixtures())->upcomingByTvStation($this->id, $query);
    }

    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @see Fixtures::pastByTvStation
     */
    public function pastFixtures(array $query = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No tv_station_id set');
        return (new Fixtures())->pastByTvStation($this->id, $query);
    }
}
