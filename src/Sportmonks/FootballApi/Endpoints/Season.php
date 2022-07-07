<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use InvalidArgumentException;
use Sportmonks\FootballApi\Clients\FootballApiClient;

/**
 * @link https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/seasons
 */
class Season extends FootballApiClient
{
    protected ?int $id;

    public function __construct(?int $id = null)
    {
        parent::__construct();
        $this->id = $id;
    }

    /**
     * Returns all the seasons available within your subscription.
     *
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function all(array $params = []): object
    {
        return $this->call('seasons', $params);
    }

    /**
     * Returns the single-season you’ve requested by ID.
     *
     * @param   int     $id     the season id
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function byId(int $id, array $params = []): object
    {
        return $this->call("seasons/$id", $params);
    }

    /**
     * Returns round information from your requested season ID.
     *
     * @alias
     * @see     Round::bySeason()
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException|InvalidArgumentException
     */
    public function rounds(array $params = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No season ID set');
        return (new Round())->bySeason($this->id, $params);
    }

    /**
     * Returns stage information from your requested season ID.
     *
     * @alias
     * @see     Stage::bySeason()
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException|InvalidArgumentException
     */
    public function stages(array $params = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No season ID set');
        return (new Stage())->bySeason($this->id, $params);
    }

    /**
     * Returns the teams from your requested season id.
     *
     * @alias
     * @see     Team::bySeason()
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException|InvalidArgumentException
     */
    public function teams(array $params = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No season ID set');
        return (new Team())->bySeason($this->id, $params);
    }

    /**
     * Returns (historical) squads from your requested season ID.
     *
     * @alias
     * @see     Squad::byTeamAndSeason()
     * @param   int     $teamId the team id
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException|InvalidArgumentException
     */
    public function teamSquad(int $teamId, array $params = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No season ID set');
        return (new Squad())->byTeamAndSeason($teamId, $this->id, $params);
    }

    /**
     * Returns venue information from your requested season ID.
     *
     * @alias
     * @see     Venue::bySeason()
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException|InvalidArgumentException
     */
    public function venues(array $params = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No season ID set');
        return (new Venue())->bySeason($this->id, $params);
    }

    /**
     * Returns the full league standing table from your requested season ID.
     *
     * @alias
     * @see     Standing::bySeason()
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException|InvalidArgumentException
     */
    public function standings(array $params = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No season ID set');
        return (new Standing())->bySeason($this->id, $params);
    }

    /**
     * Returns the standing corrections from your requested season ID.
     *
     * @alias
     * @see     Standing::correctionsBySeason()
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException|InvalidArgumentException
     */
    public function standingCorrections(array $params = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No season ID set');
        return (new Standing())->correctionsBySeason($this->id, $params);
    }

    /**
     * Returns the complete season schedule from your requested season ID.
     *
     * @see     Schedule::bySeason()
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException|InvalidArgumentException
     */
    public function schedules(array $params = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No season ID set');
        return (new Schedule())->bySeason($this->id, $params);
    }

    /**
     * Returns the complete season schedule for one specific team from your requested season ID.
     *
     * @see     Schedule::bySeasonAndTeam()
     * @param   int     $teamId the team id
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException|InvalidArgumentException
     */
    public function teamSchedules(int $teamId, array $params = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No season ID set');
        return (new Schedule())->bySeasonAndTeam($this->id, $teamId, $params);
    }

    /**
     * Returns all the topscorers per stage of the requested season.
     *
     * @alias
     * @see     TopScorer::bySeason()
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException|InvalidArgumentException
     */
    public function topScorers(array $params = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No season ID set');
        return (new TopScorer())->bySeason($this->id, $params);
    }

    /**
     * Returns all the aggregated topscorers of the requested season.
     *
     * @see     TopScorer::aggregatedBySeason()
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException|InvalidArgumentException
     */
    public function aggregatedTopScorers(array $params = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No season ID set');
        return (new TopScorer())->aggregatedBySeason($this->id, $params);
    }
}
