<?php

namespace Sportmonks\FootballApi\Clients;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\TransferStats;
use InvalidArgumentException;
use Symfony\Component\HttpFoundation\Response as StatusCode;

class BaseClient
{
    protected Client $client;
    protected ?string $apiToken = null;
    private ?string $include = null;
    private ?string $select = null;
    private ?int $page = null;
    private ?int $pageSize = null;

    public function __construct()
    {
        $token = config('football-api.token');

        if (empty($token)) {
            throw new InvalidArgumentException('No API token set');
        }

        $this->apiToken = $token;
    }

    public function include(string|array $include = []): self
    {
        if (is_array($include)) $include = join(';', $include);
        $this->include = $include;
        return $this;
    }

    public function select(string|array $fields = []): self
    {
        if (is_array($fields)) $fields = join(',', $fields);
        $this->select = $fields;
        return $this;
    }

    public function page(int $page): self
    {
        $this->page = $page;
        return $this;
    }

    public function pageSize(int $pageSize): self
    {
        $this->pageSize = $pageSize;
        return $this;
    }

    /**
     * @throws GuzzleException
     */
    protected function call(string $url, array $query = []): ?object
    {
        if (!empty($this->include)) $query['include'] = $this->include;
        if (!empty($this->select)) $query['select'] = $this->select;
        if (!empty($this->page)) $query['page'] = $this->page;
        if (!empty($this->pageSize)) $query['pageSize'] = $this->pageSize;

        $response = $this->client->get($url, [
            'headers' => [
                'Authorization' => $this->apiToken,
            ],
            'query' => [
                'tz' => config('football-api.timezone'),
                ...$query,
            ],
            'on_stats' => function (TransferStats $stats) use (&$url) {
                $url = $stats->getEffectiveUri();
            },
        ]);

        $code = $response->getStatusCode();

        if ($code === StatusCode::HTTP_OK) {
            $response = json_decode($response->getBody()->getContents());
            $response->url = $url;
            $response->statusCode = $code;
            return $response;
        }

        // @TODO handle error
        return null;
    }
}
