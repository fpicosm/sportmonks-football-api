<?php

namespace Sportmonks\FootballApi\Requests;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\CoreApiClient;
use Sportmonks\FootballApi\FootballApiClient;

/**
 * Gather an overview of all the regions available within your subscription via the regions' endpoint.
 *
 * @link https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/v/core/endpoints/regions
 */
class Region extends CoreApiClient
{
    /**
     * Returns all the regions available within your subscription.
     *
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/v/core/endpoints/regions/get-all-regions
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function all(array $params = []): object
    {
        return $this->call('regions', $params);
    }

    /**
     * Returns information from your requested region ID.
     *
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/v/core/endpoints/regions/get-region-by-id
     * @param   int     $id     the region id
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function byId(int $id, array $params = []): object
    {
        return $this->call("regions/${id}", $params);
    }

    /**
     * Returns region information that matches your search query.
     *
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/v/core/endpoints/regions/get-region-by-search
     * @param   string  $search the region name to search
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function search(string $search, array $params = []): object
    {
        return $this->call("regions/search/${search}", $params);
    }
}
