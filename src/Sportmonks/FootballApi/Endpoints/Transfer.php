<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\Clients\FootballApiClient;

/**
 * @link https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/transfers
 */
class Transfer   extends FootballApiClient
{
    protected ?int $id;

    public function __construct(?int $id = null)
    {
        parent::__construct();
        $this->id = $id;
    }

    /**
     * Returns all the transfers available within your subscription.
     *
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function all(array $params = []): object
    {
        return $this->call('transfers', $params);
    }

    /**
     * Returns transfer information from your requested transfer ID.
     *
     * @param   int     $id     the transfer id
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function byId(int $id, array $params = []): object
    {
        return $this->call("transfers/$id", $params);
    }

    /**
     * Returns the latest transfers available within your subscription.
     *
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function latest(array $params = []): object
    {
        return $this->call('transfers/latest', $params);
    }

    /**
     * Returns the transfers from your requested team ID.
     *
     * @param   int     $teamId the team id
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function byTeam(int $teamId, array $params = []): object
    {
        return $this->call("transfers/teams/$teamId", $params);
    }

    /**
     * Returns the transfers from your requested player ID.
     *
     * @param   int     $playerId   the player id
     * @param   array   $params     the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function byPlayer(int $playerId, array $params = []): object
    {
        return $this->call("transfers/players/$playerId", $params);
    }

    /**
     * Returns the transfers from your requested league ID.
     *
     * @param   int     $leagueId   the league id
     * @param   array   $params     the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function byLeague(int $leagueId, array $params = []): object
    {
        return $this->call("transfers/leagues/$leagueId", $params);
    }
}
