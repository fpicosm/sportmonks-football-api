<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use InvalidArgumentException;
use Sportmonks\FootballApi\Clients\FootballClient;

class Leagues extends FootballClient
{
    /** @var int|null the league id */
    protected ?int $id;

    /**
     * @param int|null $id the league id
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
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/leagues/get-all-leagues Docs
     */
    public function all(array $query = []): object
    {
        return $this->call('leagues', $query);
    }

    /**
     * @param int $id the league id
     * @param array $query the query params
     *
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/leagues/get-league-by-id Docs
     */
    public function find(int $id, array $query = []): object
    {
        return $this->call("leagues/$id", $query);
    }

    /**
     * @param array $query the query params
     *
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/leagues/get-leagues-by-live Docs
     */
    public function live(array $query = []): object
    {
        return $this->call('leagues/live', $query);
    }

    /**
     * @param string $date the fixture date (YYYY-MM-DD)
     * @param array $query the query params
     *
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/leagues/get-leagues-by-fixture-date Docs
     */
    public function byFixtureDate(string $date, array $query = []): object
    {
        return $this->call("leagues/date/$date", $query);
    }

    /**
     * @param int $countryId the country id
     * @param array $query the query params
     *
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/leagues/get-leagues-by-country-id Docs
     */
    public function byCountry(int $countryId, array $query = []): object
    {
        return $this->call("leagues/countries/$countryId", $query);
    }

    /**
     * @param string $name the league name
     * @param array $query the query params
     *
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/leagues/get-leagues-search-by-name Docs
     */
    public function search(string $name, array $query = []): object
    {
        return $this->call("leagues/search/$name", $query);
    }

    /**
     * @param int $teamId the team id
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/leagues/get-all-leagues-by-team-id Docs
     */
    public function allByTeam(int $teamId, array $query = []): object
    {
        return $this->call("leagues/teams/$teamId", $query);
    }

    /**
     * @param int $teamId the team id
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/leagues/get-current-leagues-by-team-id Docs
     */
    public function currentByTeam(int $teamId, array $query = []): object
    {
        return $this->call("leagues/teams/$teamId/current", $query);
    }

    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/standings/get-live-standings-by-league-id Docs
     * @see  Standings::liveByLeague
     */
    public function liveStandings(array $query = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No league_id set');
        return (new Standings())->liveByLeague($this->id, $query);
    }

    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/predictions/get-predictability-by-league-id Docs
     * @see  Predictions::byLeague
     */
    public function predictions(array $query = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No league_id set');
        return (new Predictions())->byLeague($this->id, $query);
    }
}
