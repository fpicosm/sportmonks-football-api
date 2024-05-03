<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use InvalidArgumentException;
use Sportmonks\FootballApi\Clients\FootballClient;

class Teams extends FootballClient
{
    /** @var int|null the team id */
    protected ?int $id;

    /**
     * @param int|null $id the team id
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
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/teams/get-all-teams Docs
     */
    public function all(array $query = []): object
    {
        return $this->call('teams', $query);
    }

    /**
     * @param int $id the team id
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/teams/get-team-by-id Docs
     */
    public function find(int $id, array $query = []): object
    {
        return $this->call("teams/$id", $query);
    }

    /**
     * @param int $countryId the country id
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/teams/get-teams-by-country-id Docs
     */
    public function byCountry(int $countryId, array $query = []): object
    {
        return $this->call("teams/countries/$countryId", $query);
    }

    /**
     * @param int $seasonId the season id
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/teams/get-teams-by-season-id Docs
     */
    public function bySeason(int $seasonId, array $query = []): object
    {
        return $this->call("teams/seasons/$seasonId", $query);
    }

    /**
     * @param string $name the team name to search
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/teams/get-teams-by-search-by-name Docs
     */
    public function search(string $name, array $query = []): object
    {
        return $this->call("teams/search/$name", $query);
    }

    /**
     * @param string $from the start date (YYYY-MM-DD)
     * @param string $to the end date (YYYY-MM-DD)
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/fixtures/get-fixtures-by-date-range-for-team Docs
     * @see  Fixtures::byDateRangeForTeam
     */
    public function fixturesByDateRange(string $from, string $to, array $query = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No team_id set');
        return (new Fixtures())->byDateRangeForTeam($from, $to, $this->id, $query);
    }

    /**
     * @param int $opponentId the opponent id
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/fixtures/get-fixtures-by-head-to-head Docs
     * @see  Fixtures::headToHead
     */
    public function headToHead(int $opponentId, array $query = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No team_id set');
        return (new Fixtures())->headToHead($this->id, $opponentId, $query);
    }

    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/leagues/get-all-leagues-by-team-id Docs
     * @see  Leagues::allByTeam
     */
    public function allLeagues(array $query = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No team_id set');
        return (new Leagues())->allByTeam($this->id, $query);
    }

    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/leagues/get-current-leagues-by-team-id Docs
     * @see  Leagues::currentByTeam
     */
    public function currentLeagues(array $query = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No team_id set');
        return (new Leagues())->currentByTeam($this->id, $query);
    }

    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/schedules/get-schedules-by-team-id Docs
     * @see  Schedules::byTeam
     */
    public function schedules(array $query = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No team_id set');
        return (new Schedules())->byTeam($this->id, $query);
    }

    /**
     * @param int $seasonId the season id
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @see Schedules::bySeasonAndTeam()
     */
    public function schedulesBySeason(int $seasonId, array $query = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No team_id set');
        return (new Schedules())->bySeasonAndTeam($seasonId, $this->id, $query);
    }

    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @see Seasons::byTeam
     */
    public function seasons(array $query = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No team_id set');
        return (new Seasons())->byTeam($this->id, $query);
    }

    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @see Squads::byTeam
     */
    public function squads(array $query = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No team_id set');
        return (new Squads())->byTeam($this->id, $query);
    }

    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @see Squads::extendedByTeam
     */
    public function extendedSquads(array $query = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No team_id set');
        return (new Squads())->extendedByTeam($this->id, $query);
    }

    /**
     * @param int $seasonId the season id
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @see Squads::byTeamAndSeason
     */
    public function squadsBySeason(int $seasonId, array $query = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No team_id set');
        return (new Squads())->byTeamAndSeason($this->id, $seasonId, $query);
    }

    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/transfers/get-transfers-by-team-id Docs
     * @see  Transfers::byTeam
     */
    public function transfers(array $query = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No team_id set');
        return (new Transfers())->byTeam($this->id, $query);
    }

    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/rivals/get-rivals-by-team-id Docs
     * @see  Rivals::byTeam
     */
    public function rivals(array $query = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No team_id set');
        return (new Rivals())->byTeam($this->id, $query);
    }

    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @see Statistics::teamsBySeason()
     */
    public function statisticsBySeason(int $seasonId, array $query = []): object
    {
        return (new Statistics())->teamsBySeason($seasonId, $query);
    }
}
