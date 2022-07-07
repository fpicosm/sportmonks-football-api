<?php

namespace Sportmonks\FootballApi\Requests;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\CoreApiClient;

/**
 * Gather an overview of all the countries available within your subscription via the countries' endpoint.
 * The countries' endpoint helps you with assigning leagues to the country they belong to.
 *
 * @link https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/v/core/endpoints/countries
 */
class Country extends CoreApiClient
{
    /**
     * Returns all the countries available within your subscription.
     *
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/v/core/endpoints/countries/get-all-countries
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function all(array $params = []): object
    {
        return $this->call( 'countries', $params);
    }

    /**
     * Returns information from your requested country ID.
     *
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/v/core/endpoints/countries/get-country-by-id
     * @param   int     $id the country id
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function byId(int $id, array $params = []): object
    {
        return $this->call( "countries/${id}", $params);
    }

    /**
     * Returns country information that match your search query.
     *
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/v/core/endpoints/countries/get-country-by-search
     * @param   string  $search the country name to search
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function search(string $search, array $params = []): object
    {
        return $this->call("countries/search/${search}", $params);
    }
}
