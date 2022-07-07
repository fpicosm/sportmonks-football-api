<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\Clients\FootballApiClient;

/**
 * @link https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/livescores
 */
class LiveScore extends FootballApiClient
{
    /**
     * Returns all the fixtures of the current day.
     *
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function all(array $params = []): object
    {
        return $this->call('livescores', $params);
    }

    /**
     * Returns all the live fixtures (15 minutes before the match has started and 15 minutes after it has ended).
     *
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function inplay(array $params = []): object
    {
        return $this->call('livescores/inplay', $params);
    }
}
