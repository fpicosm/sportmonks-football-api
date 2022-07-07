<?php

namespace Sportmonks\FootballApi\Requests;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\Clients\FootballApiClient;

/**
 * Access detailed venue information.
 * The venue endpoints return information about the name, city, capacity, address and venue images.
 * Use one of our 3 venue endpoints.
 * Per endpoint, you can find the details, including base URL, parameters, includes and more.
 *
 * @link https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/venues
 */
class Venue extends FootballApiClient
{
    /**
     * Returns all the venues available within your subscription.
     *
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/venues/get-all-venues
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function all(array $params = []): object
    {
        return $this->call('venues', $params);
    }

    /**
     * Returns venue information from your requested venue ID.
     *
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/venues/get-venue-by-id
     * @param   int     $id     the venue id
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function byId(int $id, array $params = []): object
    {
        return $this->call("venues/$id", $params);
    }

    /**
     * Returns venue information from your requested season ID.
     *
     * @see     Season::venues()
     * @param   int     $seasonId   a valid id from seasons endpoint
     * @param   array   $params     the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function bySeason(int $seasonId, array $params = []): object
    {
        return (new Season($seasonId))->venues($params);
    }
}
