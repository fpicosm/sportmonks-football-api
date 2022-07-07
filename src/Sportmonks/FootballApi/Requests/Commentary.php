<?php

namespace Sportmonks\FootballApi\Requests;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\Clients\FootballApiClient;

/**
 * Add a textual representation of the actions that take place in a fixture with the commentaries' endpoint.
 * The commentaries are available for the major leagues.
 * Commentaries are marked as important or goal when they meet that criteria.
 *
 * @link https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/commentaries
 */
class Commentary extends FootballApiClient
{
    /**
     * Returns all the commentaries available within your subscription
     *
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/commentaries/get-all-commentaries
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
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/commentaries/get-commentaries-by-fixture-id
     * @param   int     $fixtureId  the fixture id
     * @param   array   $params     the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function byFixture(int $fixtureId, array $params = []): object
    {
        return (new Fixture($fixtureId))->commentaries($params);
    }
}
