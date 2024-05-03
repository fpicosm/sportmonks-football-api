<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use InvalidArgumentException;
use Sportmonks\FootballApi\Clients\FootballClient;

class Seasons extends FootballClient
{
    /** @var int|null the season id */
    protected ?int $id;

    /**
     * @param int|null $id the season id
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
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/seasons/get-all-seasons Docs
     */
    public function all(array $query = []): object
    {
        return $this->call('seasons', $query);
    }

    /**
     * @param int $id the season id
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/seasons/get-seasons-by-id Docs
     */
    public function find(int $id, array $query = []): object
    {
        return $this->call("seasons/$id", $query);
    }

    /**
     * @param int $teamId the team id
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/seasons/get-seasons-by-team-id Docs
     */
    public function byTeam(int $teamId, array $query = []): object
    {
        return $this->call("seasons/teams/$teamId", $query);
    }

    /**
     * @param string $name the season year to search (YYYY)
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/seasons/get-seasons-by-search-by-name Docs
     */
    public function search(string $name, array $query = []): object
    {
        return $this->call("seasons/search/$name", $query);
    }

    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/schedules/get-schedules-by-season-id Docs
     * @see  Schedules::bySeason
     */
    public function schedules(array $query = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No season_id set');
        return (new Schedules())->bySeason($this->id, $query);
    }

    /**
     * @param int $teamId
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/schedules/get-schedules-by-season-id-and-team-id Docs
     * @see  Schedules::bySeasonAndTeam
     */
    public function schedulesByTeam(int $teamId, array $query = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No season_id set');
        return (new Schedules())->bySeasonAndTeam($this->id, $teamId, $query);
    }

    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/stages/get-stages-by-season-id Docs
     * @see  Stages::bySeason
     */
    public function stages(array $query = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No season_id set');
        return (new Stages())->bySeason($this->id, $query);
    }

    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/rounds/get-rounds-by-season-id Docs
     * @see  Rounds::bySeason
     */
    public function rounds(array $query = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No season_id set');
        return (new Rounds())->bySeason($this->id, $query);
    }

    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/standings/get-standings-by-season-id Docs
     * @see  Standings::bySeason
     */
    public function standings(array $query = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No season_id set');
        return (new Standings())->bySeason($this->id, $query);
    }

    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/standings/get-standing-correction-by-season-id Docs
     * @see  Standings::correctionBySeason
     */
    public function standingsCorrection(array $query = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No season_id set');
        return (new Standings())->correctionBySeason($this->id, $query);
    }

    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/topscorers/get-topscorers-by-season-id Docs
     * @see  Topscorers::bySeason
     */
    public function topscorers(array $query = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No season_id set');
        return (new Topscorers())->bySeason($this->id, $query);
    }

    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/teams/get-teams-by-season-id Docs
     * @see  Teams::bySeason
     */
    public function teams(array $query = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No season_id set');
        return (new Teams())->bySeason($this->id, $query);
    }

    /**
     * @param int $teamId the team id
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @see Squads::byTeamAndSeason
     */
    public function squadsByTeam(int $teamId, array $query = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No season_id set');
        return (new Squads())->byTeamAndSeason($teamId, $this->id, $query);
    }

    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @see Venues::bySeason
     */
    public function venues(array $query = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No season_id set');
        return (new Venues())->bySeason($this->id, $query);
    }

    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/news/get-pre-match-news-by-season-id Docs
     * @see  News::bySeason
     */
    public function news(array $query = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No season_id set');
        return (new News())->bySeason($this->id, $query);
    }

    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/referees/get-referees-by-season-id
     * @see  Referees::bySeason
     */
    public function referees(array $query = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No season_id set');
        return (new Referees())->bySeason($this->id, $query);
    }

    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/statistics/get-season-statistics-by-participant Docs
     * @see Statistics::playersBySeason()
     */
    public function playerStatistics(array $query = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No season_id set');
        return (new Statistics())->playersBySeason($this->id, $query);
    }

    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/statistics/get-season-statistics-by-participant Docs
     * @see Statistics::teamsBySeason()
     */
    public function teamStatistics(array $query = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No season_id set');
        return (new Statistics())->teamsBySeason($this->id, $query);
    }

    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/statistics/get-season-statistics-by-participant Docs
     * @see Statistics::coachesBySeason()
     */
    public function coachStatistics(array $query = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No season_id set');
        return (new Statistics())->coachesBySeason($this->id, $query);
    }

    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/statistics/get-season-statistics-by-participant Docs
     * @see Statistics::refereesBySeason()
     */
    public function refereeStatistics(array $query = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No season_id set');
        return (new Statistics())->refereesBySeason($this->id, $query);
    }
}
