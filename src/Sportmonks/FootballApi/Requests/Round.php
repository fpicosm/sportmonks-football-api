<?php

namespace Sportmonks\FootballApi\Requests;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApiClient;

/**
 * Most leagues have rounds related to the season. A round represents a week a fixture is played in.
 * With the rounds' endpoint we give you the ability to request data for a single round or for a whole season.
 * Use one of our 3 rounds endpoints.
 * Per endpoint, you can find the details, including base URL, parameters, includes and more.
 *
 * @link https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/rounds
 */
class Round extends FootballApiClient
{
    /**
     * Returns all rounds available within your subscription
     *
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/rounds/get-all-rounds
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
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/rounds/get-rounds-by-id
     * @param   int     $id     the round id
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function byId(int $id, array $params = []): object
    {
        return $this->call("rounds/{$id}", $params);
    }

    /**
     * Returns round information from your requested season ID.
     *
     * @see     Season::rounds()
     * @param   int     $seasonId   a valid id from seasons endpoint
     * @param   array   $params     the query params
     * @throws  GuzzleException
     */
    public function bySeason(int $seasonId, array $params = []): object
    {
        return (new Season($seasonId))->rounds($params);
    }
}
