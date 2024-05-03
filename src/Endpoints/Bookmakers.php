<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use InvalidArgumentException;
use Sportmonks\FootballApi\Clients\OddsClient;

class Bookmakers extends OddsClient
{
    /** @var int|null the id of the bookmaker */
    protected ?int $id;

    /**
     * @param int|null $id the id of the bookmaker
     */
    public function __construct(?int $id = null)
    {
        parent::__construct();
        $this->id = $id;
    }

    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/bookmakers/get-all-bookmakers Docs
     */
    public function all(array $query = []): object
    {
        return $this->call('bookmakers', $query);
    }

    /**
     * @param int $id the bookmaker id
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/bookmakers/get-bookmaker-by-id Docs
     */
    public function find(int $id, array $query = []): object
    {
        return $this->call("bookmakers/$id", $query);
    }

    /**
     * @param string $name the bookmaker name to search
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/bookmakers/get-bookmakers-by-search-by-name Docs
     */
    public function search(string $name, array $query = []): object
    {
        return $this->call("bookmakers/search/$name", $query);
    }

    /**
     * @param int $fixtureId the fixture id
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/bookmakers/get-bookmaker-by-fixture-id Docs
     */
    public function byFixture(int $fixtureId, array $query = []): object
    {
        return $this->call("bookmakers/fixtures/$fixtureId", $query);
    }

    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/bookmakers/get-all-premium-bookmakers Docs
     */
    public function premium(array $query = []): object
    {
        return $this->call('bookmakers/premium', $query);
    }

    /**
     * @param int $fixtureId the id of the fixture
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @see OddsPreMatch::byFixtureAndBookmaker
     */
    public function preMatchOddsByFixture(int $fixtureId, array $query = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No bookmaker_id set');
        return (new OddsPreMatch())->byFixtureAndBookmaker($this->id, $fixtureId, $query);
    }

    /**
     * @param int $fixtureId the id of the fixture
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @see OddsInplay::byFixtureAndBookmaker
     */
    public function inplayOddsByFixture(int $fixtureId, array $query = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No bookmaker_id set');
        return (new OddsInplay())->byFixtureAndBookmaker($this->id, $fixtureId, $query);
    }

    /**
     * @param int $fixtureId the id of the fixture
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @see OddsPremium::byFixtureAndBookmaker
     */
    public function premiumOddsByFixture(int $fixtureId, array $query = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No bookmaker_id set');
        return (new OddsPremium())->byFixtureAndBookmaker($this->id, $fixtureId, $query);
    }
}
