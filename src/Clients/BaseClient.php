<?php

namespace Sportmonks\FootballApi\Clients;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Symfony\Component\HttpFoundation\Response as StatusCode;

class BaseClient
{
    protected Client $client;
    protected ?string $apiToken = NULL;
    private ?string $include = NULL;
    private ?int $page = NULL;
    private ?int $pageSize = NULL;

    public function include (string|array $include = []) : self
    {
        if (is_array($include)) $include = join(';', $include);
        $this->include = $include;
        return $this;
    }

    public function page (int $page) : self
    {
        $this->page = $page;
        return $this;
    }

    public function pageSize (int $pageSize) : self
    {
        $this->pageSize = $pageSize;
        return $this;
    }

    /**
     * @throws GuzzleException
     */
    protected function call (string $endpoint, array $query = []) : ?object
    {
        if (!empty($this->include)) $query[ 'include' ] = $this->include;
        if (!empty($this->page)) $query[ 'page' ] = $this->page;
        if (!empty($this->pageSize)) $query[ 'pageSize' ] = $this->pageSize;

        $response = $this->client->get($endpoint, [
            'query' => [
                'api_token' => $this->apiToken,
                'tz'        => config('football-api.timezone'),
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