<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\Clients\FootballApiClient;

/**
 * @link https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/predictions
 */
class Prediction extends FootballApiClient
{
    /**
     * Returns the performances of our Predictions Model per league.
     *
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function leagues(array $params = []): object
    {
        return $this->call('predictions/leagues', $params);
    }

    /**
     * Returns all probabilities available within your subscription (probabilities are available 21 days before the match starts).
     *
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function probabilities(array $params = []): object
    {
        return $this->call('predictions/probabilities', $params);
    }

    /**
     * Returns all the predictions available for your requested fixture ID.
     *
     * @param   int     $fixtureId  the fixture id
     * @param   array   $params     the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function byFixture(int $fixtureId, array $params = []): object
    {
        return $this->call("predictions/probabilities/fixtures/$fixtureId", $params);
    }
}
