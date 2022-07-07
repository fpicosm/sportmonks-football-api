<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\Clients\FootballApiClient;

/**
 * @link https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/referees
 */
class Referee extends FootballApiClient
{
    /**
     * Returns all the referees available within your subscription
     *
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
     * @param   int     $countryId  the country id
     * @param   array   $params     the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function byCountry(int $countryId, array $params = []): object
    {
        return $this->call("referees/countries/$countryId", $params);
    }

    /**
     * Returns all the referees that match your search query.
     *
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
     * Returns all the referees that have received updates in the past two hours.
     *
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function lastUpdated(array $params = []): object
    {
        return $this->call('referees/updated', $params);
    }
}
