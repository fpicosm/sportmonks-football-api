<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\Clients\FootballApiClient;

/**
 * @link https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/commentaries
 */
class Commentary extends FootballApiClient
{
    /**
     * Returns all the commentaries available within your subscription.
     *
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function all(array $params = []): object
    {
        return $this->call('commentaries', $params);
    }

    /**
     * Returns a textual representation from the requested fixture ID.
     *
     * @param   int     $fixtureId  the fixture id
     * @param   array   $params     the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function byFixture(int $fixtureId, array $params = []): object
    {
        return $this->call("commentaries/fixtures/$fixtureId", $params);
    }
}
