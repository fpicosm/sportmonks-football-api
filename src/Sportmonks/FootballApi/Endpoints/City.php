<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\Clients\CoreApiClient;

/**
 * @link https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/v/core/endpoints/cities
 */
class City extends CoreApiClient
{
    /**
     * Returns all cities available within your subscription.
     *
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function all(array $params = []): object
    {
        return $this->call( 'cities', $params);
    }

    /**
     * Returns information from your requested city ID.
     *
     * @param   int     $id     the city id
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function byId(int $id, array $params = []): object
    {
        return $this->call( "cities/$id", $params);
    }

    /**
     * Returns cities information that matches your search query.
     *
     * @param   string  $search the city name to search
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function search(string $search, array $params = []): object
    {
        return $this->call( "cities/search/$search", $params);
    }
}
