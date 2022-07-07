<?php

namespace Globals;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApi;
use TestCase;

class PaginationTest extends TestCase
{
    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_pagination()
    {
        $data = FootballApi::cities()->all();
        $this->assertObjectHasAttribute('pagination', $data);

        $data = FootballApi::cities()->all(['page' => $data->pagination->total_pages]);
        $this->assertObjectHasAttribute('data', $data);
        $this->assertIsArray($data->data);
        $this->assertNotEmpty($data->data);

        $data = FootballApi::cities()->all(['page' => $data->pagination->total_pages + 1]);
        $this->assertObjectHasAttribute('data', $data);
        $this->assertIsArray($data->data);
        $this->assertEmpty($data->data);
    }
}
