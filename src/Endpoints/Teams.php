<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use InvalidArgumentException;
use Sportmonks\FootballApi\Clients\FootballClient;

class Teams extends FootballClient
{
    /** @var int|NULL the team id */
    protected ?int $id;

    /**
     * @param  int|NULL  $id  the team id
     */
    public function __construct (int $id = NULL)
    {
        parent::__construct();
        $this->id = $id;
    }

    /**
     * @param  array  $query  the query params
     * @throws GuzzleException
     * @return object the response object
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/teams/get-all-teams Docs
     */
    public function all (array $query = []) : object
    {
        return $this->call('teams', $query);
    }

    /**
     * @param  int    $id     the team id
     * @param  array  $query  the query params
     * @throws GuzzleException
     * @return object the response object
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/teams/get-team-by-id Docs
     */
    public function byId (int $id, array $query = []) : object
    {
        return $this->call("teams/$id", $query);
    }

    /**
     * @param  int    $countryId  the country id
     * @param  array  $query      the query params
     * @throws GuzzleException
     * @return object the response object
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/teams/get-teams-by-country-id Docs
     */
    public function byCountryId (int $countryId, array $query = []) : object
    {
        return $this->call("teams/countries/$countryId", $query);
    }

    /**
     * @param  int    $seasonId  the season id
     * @param  array  $query     the query params
     * @throws GuzzleException
     * @return object the response object
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/teams/get-teams-by-season-id Docs
     */
    public function bySeasonId (int $seasonId, array $query = []) : object
    {
        return $this->call("teams/seasons/$seasonId", $query);
    }

    /**
     * @param  string  $name   the team name to search
     * @param  array   $query  the query params
     * @throws GuzzleException
     * @return object the response object
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/teams/get-teams-by-search-by-name Docs
     */
    public function search (string $name, array $query = []) : object
    {
        return $this->call("teams/search/$name", $query);
    }

    /**
     * @param  string  $from   the start date (YYYY-MM-DD)
     * @param  string  $to     the end date (YYYY-MM-DD)
     * @param  array   $query  the query params
     * @throws GuzzleException
     * @return object the response object
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/fixtures/get-fixtures-by-date-range-for-team Docs
     */
    public function fixturesByDateRange (string $from, string $to, array $query = []) : object
    {
        if (!$this->id) throw new InvalidArgumentException('No team_id set');
        return $this->call("fixtures/between/$from/$to/$this->id", $query);
    }

    /**
     * @param  int    $opponentId  the opponent id
     * @param  array  $query       the query params
     * @throws GuzzleException
     * @return object the response object
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/fixtures/get-fixtures-by-head-to-head Docs
     */
    public function headToHead (int $opponentId, array $query = []) : object
    {
        if (!$this->id) throw new InvalidArgumentException('No team_id set');
        return $this->call("fixtures/head-to-head/$this->id/$opponentId", $query);
    }

    /**
     * @param  array  $query  the query params
     * @throws GuzzleException
     * @return object the response object
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/leagues/get-all-leagues-by-team-id Docs
     */
    public function leagues (array $query = []) : object
    {
        if (!$this->id) throw new InvalidArgumentException('No team_id set');
        return $this->call("leagues/teams/$this->id", $query);
    }

    /**
     * @param  array  $query  the query params
     * @throws GuzzleException
     * @return object the response object
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/leagues/get-current-leagues-by-team-id Docs
     */
    public function currentLeagues (array $query = []) : object
    {
        if (!$this->id) throw new InvalidArgumentException('No team_id set');
        return $this->call("leagues/teams/$this->id/current", $query);
    }

    /**
     * @param  array  $query  the query params
     * @throws GuzzleException
     * @return object the response object
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/schedules/get-schedules-by-team-id Docs
     */
    public function schedules (array $query = []) : object
    {
        if (!$this->id) throw new InvalidArgumentException('No team_id set');
        return $this->call("schedules/teams/$this->id", $query);
    }

    /**
     * @param  int    $seasonId  the season id
     * @param  array  $query     the query params
     * @throws GuzzleException
     * @return object the response object
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/schedules/get-schedules-by-season-id-and-team-id Docs
     */
    public function schedulesBySeasonId (int $seasonId, array $query = []) : object
    {
        if (!$this->id) throw new InvalidArgumentException('No team_id set');
        return $this->call("schedules/seasons/$seasonId/teams/$this->id", $query);
    }

    /**
     * @param  array  $query  the query params
     * @throws GuzzleException
     * @return object the response object
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/seasons/get-seasons-by-team-id Docs
     */
    public function seasons (array $query = []) : object
    {
        if (!$this->id) throw new InvalidArgumentException('No team_id set');
        return $this->call("seasons/teams/$this->id", $query);
    }

    /**
     * @param  array  $query  the query params
     * @throws GuzzleException
     * @return object the response object
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/team-squads/get-team-squad-by-team-id Docs
     */
    public function squads (array $query = []) : object
    {
        if (!$this->id) throw new InvalidArgumentException('No team_id set');
        return $this->call("squads/teams/$this->id", $query);
    }

    /**
     * @param  int    $seasonId  the season id
     * @param  array  $query     the query params
     * @throws GuzzleException
     * @return object the response object
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/team-squads/get-team-squad-by-team-and-season-id Docs
     */
    public function squadsBySeasonId (int $seasonId, array $query = []) : object
    {
        if (!$this->id) throw new InvalidArgumentException('No team_id set');
        return $this->call("squads/seasons/$seasonId/teams/$this->id", $query);
    }

    /**
     * @param  array  $query  the query params
     * @throws GuzzleException
     * @return object the response object
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/transfers/get-transfers-by-team-id Docs
     */
    public function transfers (array $query = []) : object
    {
        if (!$this->id) throw new InvalidArgumentException('No team_id set');
        return $this->call("transfers/teams/$this->id", $query);
    }
}