<?php

namespace Sportmonks\FootballApi\Requests;

use GuzzleHttp\Exception\GuzzleException;
use InvalidArgumentException;
use Sportmonks\FootballApi\Clients\FootballApiClient;

/**
 * Gather an overview of all the historical and current seasons available within your subscription.
 * Responses provide you details like the Season ID, Name, League ID, Year and if the Season is Active Yes or No.
 *
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
     * Returns all the seasons available within your subscription
     *
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/seasons/get-all-seasons
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
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/seasons/get-seasons-by-id
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
     * @see     Round::bySeason()
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/rounds/get-rounds-by-season-id
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException|InvalidArgumentException
     */
    public function rounds(array $params = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No season ID set');
        return $this->call("rounds/seasons/$this->id", $params);
    }

    /**
     * Returns stage information from your requested season ID.
     *
     * @see     Stage::bySeason()
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/stages/get-stages-by-season-id
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException|InvalidArgumentException
     */
    public function stages(array $params = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No season ID set');
        return $this->call("stages/seasons/$this->id", $params);
    }

    /**
     * Returns the teams from your requested season id.
     *
     * @see     Team::bySeason()
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/teams/get-team-by-season-id
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException|InvalidArgumentException
     */
    public function teams(array $params = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No season ID set');
        return $this->call("teams/seasons/$this->id", $params);
    }

    /**
     * Returns (historical) squads from your requested season ID.
     *
     * @see     Team::squadBySeason()
     * @see     TeamSquad::byTeamAndSeason()
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/team-squads/get-team-squads-by-team-id
     * @param   int     $teamId a valid team id from teams endpoint
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException|InvalidArgumentException
     */
    public function teamSquad(int $teamId, array $params = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No season ID set');

        return $this->call("squads/seasons/$this->id/teams/$teamId", $params);
    }

    /**
     * Returns venue information from your requested season ID.
     *
     * @see     Venue::bySeason()
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/venues/get-venues-by-season-id
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException|InvalidArgumentException
     */
    public function venues(array $params = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No season ID set');
        return $this->call("venues/seasons/$this->id", $params);
    }

    /**
     * Returns the full league standing table from your requested season ID.
     *
     * @see     Standing::bySeason()
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/standings/get-standings-by-season-id
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException|InvalidArgumentException
     */
    public function standings(array $params = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No season ID set');
        return $this->call("standings/seasons/$this->id", $params);
    }

    /**
     * Returns the standing corrections from your requested season ID.
     *
     * @see     Standing::seasonCorrections()
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/standings/get-standing-correction-by-season-id
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException|InvalidArgumentException
     */
    public function standingCorrections(array $params = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No season ID set');
        return $this->call("standings/corrections/seasons/$this->id", $params);
    }

    /**
     * Returns the complete season schedule from your requested season ID.
     *
     * @see     Schedule::bySeason()
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/schedules/get-schedules-by-season-id
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException|InvalidArgumentException
     */
    public function schedules(array $params = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No season ID set');
        return $this->call("schedules/seasons/$this->id", $params);
    }

    /**
     * Returns the complete season schedule for one specific team from your requested season ID.
     *
     * @see     Schedule::bySeasonAndTeam()
     * @see     Team::seasonSchedule()
     * @param   int     $teamId the team id
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException|InvalidArgumentException
     */
    public function teamSchedule(int $teamId, array $params = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No season ID set');
        return $this->call("schedules/seasons/$this->id/teams/$teamId", $params);
    }

    /**
     * This endpoint returns all the topscorers per stage of the requested season.
     *
     * @see     TopScorer::bySeason()
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/topscorers/get-topscorers-by-season-id
     * @param   array   $params     the query params
     * @return  object  the response object
     * @throws  GuzzleException|InvalidArgumentException
     */
    public function topScorers(array $params = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No season ID set');
        return $this->call("topscorers/seasons/$this->id", $params);
    }

    /**
     * This endpoint returns all the aggregated topscorers of the requested season.
     *
     * @see     TopScorer::aggregatedBySeason()
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/topscorers/get-aggregated-topscorers-by-season-id
     * @param   array   $params     the query params
     * @return  object  the response object
     * @throws  GuzzleException|InvalidArgumentException
     */
    public function topScorersAggregated(array $params = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No season ID set');
        return $this->call("topscorers/seasons/$this->id/aggregated", $params);
    }
}
