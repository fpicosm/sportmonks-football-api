<?php

namespace Sportmonks\FootballApi\Requests;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApiClient;

/**
 * Gather an overview of all the leagues available within your subscription via the leagues' endpoint.
 * Retrieve basic league information or enrich your response with the season and fixture information.
 *
 * @link https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/leagues
 */
class League extends FootballApiClient
{
    /**
     * Returns all the leagues available within your subscription
     *
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/leagues/get-all-leagues
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function all(array $params = []): object
    {
        return $this->call('leagues', $params);
    }

    /**
     * Returns information from your requested league ID.
     *
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/leagues/get-league-by-id
     * @param   int     $id the league id
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function byId(int $id, array $params = []): object
    {
        return $this->call("leagues/{$id}", $params);
    }

    /**
     * Returns all the leagues that with fixtures that are currently being played.
     *
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/leagues/get-leagues-by-live
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function live(array $params = []): object
    {
        return $this->call("leagues/live", $params);
    }

    /**
     * Returns all the leagues with fixtures from your requested fixture date.
     *
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/leagues/get-leagues-by-fixture-date
     * @param   string  $date   a valid date
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function byDate(string $date, array $params = []): object
    {
        return $this->call("leagues/fixtures/date/{$date}", $params);
    }

    /**
     * Returns all the leagues from your requested country ID.
     *
     * @see     Country
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/leagues/get-leagues-by-country-id
     * @param   int     $countryId  a valid country id from countries endpoint
     * @param   array   $params     the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function byCountry(int $countryId, array $params = []): object
    {
        return $this->call("leagues/countries/{$countryId}", $params);
    }

    /**
     * Returns all the leagues that match your search query.
     *
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/leagues/get-leagues-search-by-name
     * @param   string  $name   the league name to search
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function search(string $name, array $params = []): object
    {
        return $this->call("leagues/search/{$name}", $params);
    }
}
