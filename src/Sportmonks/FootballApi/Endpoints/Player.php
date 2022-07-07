<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use InvalidArgumentException;
use Sportmonks\FootballApi\Clients\FootballApiClient;

/**
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
     * Returns all the players available within your subscription.
     *
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function all(array $params = []): object
    {
        return $this->call('players', $params);
    }

    /**
     * Returns player information from your requested player ID.
     *
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
     * Returns player information from your requested country ID.
     *
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
     * Returns all the players that match your search query.
     *
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
     * Returns all the players that have received updates in the past two hours.
     *
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
     * @alias
     * @see     Transfer::byPlayer()
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function transfers(array $params = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No player ID set');
        return (new Transfer())->byPlayer($this->id, $params);
    }
}
