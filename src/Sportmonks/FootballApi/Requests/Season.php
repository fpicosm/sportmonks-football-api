<?php

namespace Sportmonks\FootballApi\Requests;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApiClient;

/**
 * Gather an overview of all the historical and current seasons available within your subscription.
 * Responses provide you details like the Season ID, Name, League ID, Year and if the Season is Active Yes or No.
 *
 * @link https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/seasons
 */
class Season extends FootballApiClient
{
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
        return $this->call("seasons/{$id}", $params);
    }
}
