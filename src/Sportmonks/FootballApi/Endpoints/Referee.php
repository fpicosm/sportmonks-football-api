<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\Clients\FootballApiClient;

/**
 * Retrieve detailed referee information via one of our 4 referees' endpoints.
 * You can retrieve more detailed information by using the correct includes.
 * Per endpoint, you can find the details including base URL, parameters, includes and more.
 *
 * @link https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/referees
 */
class Referee extends FootballApiClient
{
    /**
     * Returns all the referees available within your subscription
     *
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/referees/get-all-referees
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function all(array $params = []): object
    {
        return $this->call('referees', $params);
    }

    /**
     * Returns referee information from your requested referee ID.
     *
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/referees/get-referees-by-id
     * @param   int     $id     the referee id
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function byId(int $id, array $params = []): object
    {
        return $this->call("referees/$id", $params);
    }

    /**
     * Returns referee information from your requested country ID.
     *
     * @see     Country::referees()
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/referees/get-referees-by-country-id
     * @param   int     $countryId  a valid id from countries endpoint
     * @param   array   $params     the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function byCountry(int $countryId, array $params = []): object
    {
        return $this->call("referees/countries/$countryId", $params);
    }

    /**
     * This endpoint returns all the referees that match your search query.
     *
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/referees/get-referees-by-search-by-name
     * @param   string  $name   the referee name to search
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function search(string $name, array $params = []): object
    {
        return $this->call("referees/search/$name", $params);
    }

    /**
     * This endpoint returns all the referees that have received updates in the past two hours.
     *
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/referees/get-last-updated-referees
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function lastUpdated(array $params = []): object
    {
        return $this->call('referees/updated', $params);
    }
}
