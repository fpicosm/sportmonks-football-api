<?php

namespace Sportmonks\FootballApi;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class SportmonksClient
{
    protected Client $client;

    /**
     * @throws GuzzleException
     */
    protected function call(string $url, array $options = [])
    {
        $query = [];

        $include = [];
        if (array_key_exists('include', $options)) {
            $include = $options['include'];
        }

        if (array_key_exists('includes', $options)) {
            $include = $options['includes'];
        }

        if (!empty($include)) {
            $query['include'] = is_array($include) ? join(';', $include) : $include;
        }

        if (array_key_exists('page', $options)) {
            $query['page'] = $options['page'];
        }

        if (array_key_exists('select', $options)) {
            $select = $options['select'];
            if (!empty($select)) {
                $query['select'] = is_array($select) ? join(',', $select) : $select;
            }
        }

        $response = $this->client->get($url, ['query' => $query]);
        $code = $response->getStatusCode();
        if ($code === ResponseAlias::HTTP_OK) {
            return json_decode($response->getBody()->getContents());
        }
    }
}
