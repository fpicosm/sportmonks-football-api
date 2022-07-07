<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\Clients\FootballApiClient;

/**
 * @link https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/coaches
 */
class Coach extends FootballApiClient
{
    /**
     * Returns all the coaches available within your subscription
     *
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
     * @param   int     $countryId  the country id
     * @param   array   $params     the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function byCountry(int $countryId, array $params = []): object
    {
        return $this->call("coaches/countries/$countryId", $params);
    }

    /**
     * Returns all the coaches that match your search query.
     *
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
     * Returns all the coaches that have received updates in the past two hours.
     *
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function lastUpdated(array $params = []): object
    {
        return $this->call('coaches/updated', $params);
    }
}
