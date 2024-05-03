<?php

namespace Sportmonks\FootballApi\Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use InvalidArgumentException;
use Sportmonks\FootballApi\Clients\OddsClient;

class Markets extends OddsClient
{
    /** @var int|null the id of the market */
    protected ?int $id;

    /**
     * @param int|null $id the id of the market
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
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/markets/get-all-markets Docs
     */
    public function all(array $query = []): object
    {
        return $this->call('markets', $query);
    }

    /**
     * @param int $id the market id
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/markets/get-market-by-id Docs
     */
    public function find(int $id, array $query = []): object
    {
        return $this->call("markets/$id", $query);
    }

    /**
     * @param string $name the market name to search
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/markets/get-markets-by-search-by-name Docs
     */
    public function search(string $name, array $query = []): object
    {
        return $this->call("markets/search/$name", $query);
    }

    /**
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @link https://docs.sportmonks.com/football/endpoints-and-entities/endpoints/markets/get-all-premium-markets Docs
     */
    public function premium(array $query = []): object
    {
        return $this->call('markets/premium', $query);
    }

    /**
     * @param int $fixtureId the id of the fixture
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @see OddsPreMatch::byFixtureAndMarket
     */
    public function preMatchOddsByFixture(int $fixtureId, array $query = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No market_id set');
        return (new OddsPreMatch())->byFixtureAndMarket($this->id, $fixtureId, $query);
    }

    /**
     * @param int $fixtureId the id of the fixture
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @see OddsInplay::byFixtureAndMarket
     */
    public function inplayOddsByFixture(int $fixtureId, array $query = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No market_id set');
        return (new OddsInplay())->byFixtureAndMarket($this->id, $fixtureId, $query);
    }

    /**
     * @param int $fixtureId the id of the fixture
     * @param array $query the query params
     * @return object the response object
     * @throws GuzzleException
     * @see OddsPremium::byFixtureAndMarket
     */
    public function premiumOddsByFixture(int $fixtureId, array $query = []): object
    {
        if (!$this->id) throw new InvalidArgumentException('No market_id set');
        return (new OddsPremium())->byFixtureAndMarket($this->id, $fixtureId, $query);
    }
}
