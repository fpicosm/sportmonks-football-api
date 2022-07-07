<?php

namespace Sportmonks\FootballApi\Requests;

use GuzzleHttp\Exception\GuzzleException;
use InvalidArgumentException;
use Sportmonks\FootballApi\FootballApiClient;

/**
 * Retrieve detailed transfers information via one of our 6 transfers' endpoints.
 * You can retrieve more detailed information by using the correct includes.
 * Per endpoint, you can find the details including base URL, parameters, includes and more.
 *
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
     * Returns all the transfers available within your subscription
     *
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/transfers/get-all-transfers
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
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/transfers/get-transfers-by-id
     * @param   int     $id     the transfer id
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function byId(int $id, array $params = []): object
    {
        return $this->call("transfers/{$id}", $params);
    }

    /**
     * Returns the latest transfers available within your subscription.
     *
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/transfers/get-latest-transfers
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function latest(array $params = []): object
    {
        return $this->call("transfers/latest", $params);
    }

    /**
     * Returns the transfers from your requested team ID.
     *
     * @see     Team::transfers()
     * @param   int     $teamId the team id
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function byTeam(int $teamId, array $params = []): object
    {
        return (new Team($teamId))->transfers($params);
    }

    /**
     * Returns the transfers from your requested player ID.
     *
     * @see     Player::transfers();
     * @param   int     $playerId   the player id
     * @param   array   $params     the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function byPlayer(int $playerId, array $params = []): object
    {
        return (new Player($playerId))->transfers($params);
    }

    /**
     * Returns the transfers from your requested league ID.
     *
     * @see     League::transfers()
     * @param   int     $leagueId   the league id
     * @param   array   $params     the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function byLeague(int $leagueId, array $params = []): object
    {
        return $this->call("transfers/leagues/{$leagueId}", $params);
    }
}
