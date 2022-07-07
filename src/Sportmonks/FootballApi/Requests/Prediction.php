<?php

namespace Sportmonks\FootballApi\Requests;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApiClient;

/**
 * Enrich your applications with detailed predictions.
 * Our Predictions API offers predictions on various markets like the winner, correct scores, over/under and both teams to score (BTTS) are all available here,
 * produced with our machine learning techniques and models.
 * Use one of our 3 probabilities endpoints.
 * Per endpoint, you can find the details, including base URL, parameters, includes and more.
 *
 * @link https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/predictions
 */
class Prediction extends FootballApiClient
{
    /**
     * This endpoint returns the performances of our Predictions Model per league.
     *
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/predictions/get-leagues-and-performances
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function leagues(array $params = []): object
    {
        return $this->call('predictions/leagues', $params);
    }

    /**
     * This endpoint returns all probabilities available within your subscription.
     * Note: All probabilities are available 21 days before the match starts.
     *
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/predictions/get-probabilities
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function probabilities(array $params = []): object
    {
        return $this->call('predictions/probabilities', $params);
    }

    /**
     * This endpoint returns all the predictions available for your requested fixture ID.
     *
     * @see     Fixture::predictions()
     * @param   int     $fixtureId  the fixture id
     * @param   array   $params     the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function byFixture(int $fixtureId, array $params = []): object
    {
        return (new Fixture($fixtureId))->predictions($params);
    }
}
