<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\Clients\FootballApiClient;

/**
 * You can obtain all the fixtures that are currently in-play via our livescores endpoints.
 * The livescores endpoint returns all live fixtures that are presently in-play within your subscription.
 * Responses of the livescore endpoint are highly customizable because many includes are available to extend the response.
 * You can find a list of available includes below, listed per endpoint option.
 *
 * @link https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/livescores
 */
class LiveScore extends FootballApiClient
{
    /**
     * Returns all the fixtures of the current day.
     *
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/livescores/get-all-livescores
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function all(array $params = []): object
    {
        return $this->call('livescores', $params);
    }

    /**
     * Returns all the live fixtures.
     * Please be aware that in the livescores endpoint, the fixtures will be available 15 minutes before the match has started and 15 minutes after it has ended.
     *
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/livescores/get-inplay-livescores
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function inplay(array $params = []): object
    {
        return $this->call('livescores/inplay', $params);
    }
}
