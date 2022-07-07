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

        $data = FootballApi::cities()->page($data->pagination->total_pages)->all();
        $this->assertObjectHasAttribute('data', $data);
        $this->assertIsArray($data->data);
        $this->assertNotEmpty($data->data);

        $data = FootballApi::cities()->page($data->pagination->total_pages + 1)->all();
        $this->assertObjectHasAttribute('data', $data);
        $this->assertIsArray($data->data);
        $this->assertEmpty($data->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_by_page_size()
    {
        $data = FootballApi::players()->perPage(50)->all();
        $this->assertIsArray($data->data);
        $this->assertCount(50, $data->data);
    }
}
