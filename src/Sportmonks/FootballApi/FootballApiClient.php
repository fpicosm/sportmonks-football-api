<?php

namespace Sportmonks\FootballApi;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Response;
use InvalidArgumentException;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class FootballApiClient
{
    protected Client $core;
    protected Client $client;

    public function __construct()
    {
        $apiToken = config('football-api.api_token');
        if (empty($apiToken)) throw new InvalidArgumentException('No API token set');

        $this->core = new Client([
            'base_uri' => 'https://api.sportmonks.com/v3/core/',
            'headers' => [
                'Authorization' => $apiToken,
            ],
        ]);

        $this->client = new Client([
            'base_uri' => 'https://api.sportmonks.com/v3/football',
            'headers' => [
                'Authorization' => $apiToken,
            ]
        ]);
    }

    /**
     * @throws GuzzleException
     */
    protected function call(Client $client, string $url, string|array $include = '')
    {
        $query = [];
        if (!empty($include)) $query['include'] = is_string($include) ? $include : join(';', $include);
        $response = $client->get($url, ['query' => $query]);

        $code = $response->getStatusCode();
        if ($code === ResponseAlias::HTTP_OK) {
            return json_decode($response->getBody()->getContents());
        }
    }
}
