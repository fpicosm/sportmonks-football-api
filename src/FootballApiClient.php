<?php

namespace Sportmonks\FootballApi;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use InvalidArgumentException;
use Symfony\Component\HttpFoundation\Response as StatusCode;

class FootballApiClient
{
    protected Client $client;
    protected ?string $apiToken = NULL;
    private ?string $include = NULL;
    private ?int $page = NULL;
    private ?int $pageSize = NULL;

    public function __construct ()
    {
        $token = config('football-api.token');

        if (empty($token)) throw new InvalidArgumentException('No API token set');

        $this->client = new Client([
            'base_uri' => 'https://soccer.sportmonks.com/api/v2.0/',
        ]);

        $this->apiToken = $token;
    }

    public function include (string|array $include = []) : FootballApiClient
    {
        if (is_array($include)) $include = join(',', $include);
        $this->include = $include;
        return $this;
    }

    public function page (int $page) : FootballApiClient
    {
        $this->page = $page;
        return $this;
    }

    public function pageSize (int $pageSize) : FootballApiClient
    {
        $this->pageSize = $pageSize;
        return $this;
    }

    /**
     * @throws GuzzleException
     */
    protected function call (string $endpoint, array $query = []) : ?object
    {
        if (!empty($this->include)) $query['include'] = $this->include;
        if (!empty($this->page)) $query['page'] = $this->page;
        if (!empty($this->pageSize)) $query['pageSize'] = $this->pageSize;

        $response = $this->client->get($endpoint, [
            'query' => [
                'api_token' => $this->apiToken,
                'tz' => config('football-api.timezone'),
                ...$query,
            ],
        ]);

        $code = $response->getStatusCode();

        if ($code === StatusCode::HTTP_OK) {
            return json_decode($response->getBody()->getContents());
        }

        // @TODO handle error
        return NULL;
    }
}
