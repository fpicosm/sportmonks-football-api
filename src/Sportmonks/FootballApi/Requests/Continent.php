<?php

namespace Sportmonks\FootballApi\Requests;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\CoreApiClient;

/**
 * Gather an overview of all the continents available within your subscription via the continents' endpoint.
 * The continents' endpoint helps you assign countries and leagues to the part of the World they belong to.
 *
 * @link https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/v/core/endpoints/continents
 */
class Continent extends CoreApiClient
{
    /**
     * Returns all the continents available within your subscription.
     *
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/v/core/endpoints/continents/get-all-continents
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function all(array $params = []): object
    {
        return $this->call('continents', $params);
    }

    /**
     * Returns information from your requested continent ID.
     *
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/v/core/endpoints/continents/get-continent-by-id
     * @param   int     $id the continent id
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function byId(int $id, array $params = []): object
    {
        return $this->call("continents/${id}", $params);
    }
}
