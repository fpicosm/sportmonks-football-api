<?php

namespace Sportmonks\FootballApi\Requests;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApiClient;

/**
 * There are multiple options to retrieve the fixtures within your subscription.
 * The fixtures’ endpoints are divided into 8 categories.
 * Per endpoint, you can find the details, including base URL, parameters, include options and more.
 *
 * @link https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/fixtures
 */
class Fixture extends FootballApiClient
{
    /**
     * Returns all the fixtures accessible within your subscription.
     *
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/fixtures/get-all-fixtures
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function all(array $params = []): object
    {
        return $this->call('fixtures', $params);
    }

    /**
     * Returns fixture information from your requested fixture ID.
     *
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/fixtures/get-fixture-by-id
     * @param   int     $id     the fixture id
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function byId(int $id, array $params = []): object
    {
        return $this->call("fixtures/{$id}", $params);
    }

    /**
     * Returns the fixtures you’ve requested by IDs.
     *
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/fixtures/get-fixtures-by-multiple-ids
     * @param   string|array    $ids    an array or comma separated string
     * @param   array           $params the query params
     * @return  object          the response object
     * @throws  GuzzleException
     */
    public function byIds(string|array $ids, array $params = []): object
    {
        if (is_array($ids)) $ids = join(',', $ids);
        return $this->call("fixtures/multi/{$ids}", $params);
    }

    /**
     * Returns the fixtures you’ve requested by IDs.
     *
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/fixtures/get-fixture-by-date-range
     * @param   string  $start  the start date
     * @param   string  $end    the end date
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function byDateRange(string $start, string $end, array $params = []): object
    {
        return $this->call("fixtures/between/{$start}/{$end}", $params);
    }

    /**
     * Returns all the fixtures from your requested date.
     *
     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/fixtures/get-fixtures-by-date
     * @param   string  $date   a valid date
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function byDate(string $date, array $params = []): object
    {
        return $this->call("fixtures/date/{$date}", $params);
    }

    /**
     * Returns you all the games that have received updates within 2 hours.

     * @link    https://docs.sportmonks.com/football2/MTf0RssMhRVvcd3EfGAh/getting-started/endpoints/fixtures/get-last-updated-fixtures
     * @param   array   $params the query params
     * @return  object  the response object
     * @throws  GuzzleException
     */
    public function lastUpdated(array $params = []): object
    {
        return $this->call('fixtures/updates', $params);
    }
}
