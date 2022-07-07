<?php

namespace Sportmonks\FootballApi\Clients;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class BaseClient
{
    protected Client $client;
    protected string $select = '';
    protected string $include = '';
    protected int $perPage;
    protected int $page;

    /**
     * @throws GuzzleException
     */
    protected function call(string $url, array $query = [])
    {
        if (!empty($this->page)) {
            $query['page'] = $this->page;
        }

        if (!empty($this->perPage)) {
            $query['per_page'] = $this->perPage;
        }

        if (!empty($this->include)) {
            $query['include'] = $this->include;
        }

        if (!empty($this->select)) {
            $query['select'] = $this->select;
        }

        $response = $this->client->get($url, ['query' => $query]);
        $code = $response->getStatusCode();
        if ($code === ResponseAlias::HTTP_OK) {
            return json_decode($response->getBody()->getContents());
        }
    }

    /**
     * Set includes options
     * @param   string|array $includes the includes options
     * @return BaseClient
     */
    public function include(string|array $includes = []): BaseClient
    {
        if (is_array($includes)) $includes = join(';', $includes);
        $this->include = $includes;
        return $this;
    }

    /**
     * Set select option
     * @param   string|array $select the select option
     * @return  BaseClient
     */
    public function select(string|array $select = []): BaseClient
    {
        if (is_array($select)) $select = join(',', $select);
        $this->select = $select;
        return $this;
    }

    /**
     * Set page number
     * @param   int $number the page number
     * @return  BaseClient
     */
    public function page(int $number): BaseClient
    {
        $this->page = $number;
        return $this;
    }

    /**
     * Set page number
     * @param   int $size the page size
     * @return  BaseClient
     */
    public function perPage(int $size): BaseClient
    {
        $this->perPage = $size;
        return $this;
    }
}
