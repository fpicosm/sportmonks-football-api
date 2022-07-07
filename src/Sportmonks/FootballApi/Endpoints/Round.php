<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use InvalidArgumentException;
use Sportmonks\FootballApi\Clients\FootballApiClient;

/**
 * @link https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/rounds
 */
class Round extends FootballApiClient
{
    protected ?int $id;

    public function __construct(?int $id = null)
    {
        parent::__construct();
        $this->id = $id;
    }

    /**
     * Returns all rounds available within your subscription
     *
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function all(array $params = []): object
    {
        return $this->call('rounds', $params);
    }

    /**
     * Returns round information from your requested round ID.
     *
     * @param   int     $id     the round id
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function byId(int $id, array $params = []): object
    {
        return $this->call("rounds/$id", $params);
    }

    /**
     * Returns round information from your requested season ID.
     *
     * @param   int     $seasonId   the season id
     * @param   array   $params     the query params
     * @throws  GuzzleException
     */
    public function bySeason(int $seasonId, array $params = []): object
    {
        return $this->call("rounds/seasons/$seasonId", $params);
    }

    /**
     * Returns the full league standing table from your requested round ID.
     *
     * @alias
     * @see     Standing::byRound()
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function standings(array $params = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No round ID set');
        return (new Standing())->byRound($this->id, $params);
    }
}
