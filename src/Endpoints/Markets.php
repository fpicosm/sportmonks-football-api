<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use InvalidArgumentException;
use Sportmonks\FootballApi\FootballApiClient;

class Markets extends FootballApiClient
{
    /**
     * @var int|null the market id
     */
    protected ?int $id;

    /**
     * @param  int|null  $id  the market id
     */
    public function __construct (?int $id = NULL)
    {
        parent::__construct();
        $this->id = $id;
    }

    /**
     * @return object the response object
     *
     * @param  array  $query  the query params
     *
     * @throws GuzzleException
     */
    public function all (array $query = []) : object
    {
        return $this->call('markets', $query);
    }

    /**
     * @return object the response object
     *
     * @param  array  $query  the query params
     *
     * @throws GuzzleException
     * @see Fixtures::markets()
     */
    public function fixtures (array $query = []) : object
    {
        if (!$this->id) throw new InvalidArgumentException('No ID set');
        return $this->call("markets/$this->id/fixtures", $query);
    }

    /**
     * @return object the response object
     *
     * @param  int    $id     the market id
     * @param  array  $query  the query params
     *
     * @throws GuzzleException
     */
    public function find (int $id, array $query = []) : object
    {
        return $this->call("markets/$id", $query);
    }
}
