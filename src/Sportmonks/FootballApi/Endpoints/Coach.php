<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\Clients\FootballApiClient;

/**
 * Retrieve detailed coach information via one of our 5 coaches endpoints.
 * You can retrieve more detailed information by using the correct includes.
 * Per endpoint, you can find the details including base URL, parameters, includes and more.
 *
 * @link https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/coaches
 */
class Coach extends FootballApiClient
{
    /**
     * Returns all the coaches available within your subscription
     *
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/coaches/get-all-coaches
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function all(array $params = []): object
    {
        return $this->call('coaches', $params);
    }

    /**
     * Returns coach information from your requested coach ID.
     *
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/coaches/get-coaches-by-id
     * @param   int     $id     the coach id
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function byId(int $id, array $params = []): object
    {
        return $this->call("coaches/$id", $params);
    }

    /**
     * Returns coach information from your requested country ID.
     *
     * @see     Country::coaches()
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/coaches/get-coaches-by-country-id
     * @param   int     $countryId  a valid id from countries endpoint
     * @param   array   $params     the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function byCountry(int $countryId, array $params = []): object
    {
        return $this->call("coaches/countries/$countryId", $params);
    }

    /**
     * This endpoint returns all the coaches that match your search query.
     *
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/coaches/get-coaches-by-search-by-name
     * @param   string  $name   the coach name to search
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function search(string $name, array $params = []): object
    {
        return $this->call("coaches/search/$name", $params);
    }

    /**
     * This endpoint returns all the coaches that have received updates in the past two hours.
     *
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/coaches/get-last-updated-coaches
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function lastUpdated(array $params = []): object
    {
        return $this->call('coaches/updated', $params);
    }
}
