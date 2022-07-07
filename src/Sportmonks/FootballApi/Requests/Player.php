<?php

namespace Sportmonks\FootballApi\Requests;

use GuzzleHttp\Exception\GuzzleException;
use InvalidArgumentException;
use Sportmonks\FootballApi\FootballApiClient;

/**
 * Retrieve detailed player information via one of our player endpoints.
 * You can retrieve more detailed information by using the correct includes.
 * Per endpoint, you can find the details including base URL, parameters, includes and more.
 *
 * @link https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/players
 */
class Player extends FootballApiClient
{
    protected ?int $id;

    /**
     * @param int|null $id  the team id
     */
    public function __construct(?int $id = null)
    {
        parent::__construct();
        $this->id = $id;
    }

    /**
     * Returns all the players available within your subscription
     *
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/players/get-all-players
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function all(array $params = []): object
    {
        return $this->call('players', $params);
    }

    /**
     * This endpoint returns player information from your requested player ID.
     *
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/players/get-players-by-id
     * @param   int     $id     the player id
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function byId(int $id, array $params = []): object
    {
        return $this->call("players/$id", $params);
    }

    /**
     * This endpoint returns player information from your requested country ID.
     *
     * @see     Country::players()
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/players/get-players-by-country-id
     * @param   int     $countryId  a valid id from countries endpoint
     * @param   array   $params     the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function byCountry(int $countryId, array $params = []): object
    {
        return $this->call("players/countries/$countryId", $params);
    }

    /**
     * This endpoint returns all the players that match your search query.
     *
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/players/get-players-by-search-by-name
     * @param   string  $name   the player name to search
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function search(string $name, array $params = []): object
    {
        return $this->call("players/search/$name", $params);
    }

    /**
     * This endpoint returns all the players that have received updates in the past two hours.
     *
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/players/get-last-updated-players
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function lastUpdated(array $params = []): object
    {
        return $this->call('players/updated', $params);
    }

    /**
     * Returns the transfers from your requested player ID.
     *
     * @see     Transfer::byPlayer()
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/transfers/get-transfers-by-player-id
     * @param   array   $params     the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function transfers(array $params = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No player ID set');
        return $this->call("transfers/players/$this->id", $params);
    }
}
