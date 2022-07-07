<?php

namespace Requests;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApi;
use TestCase;

class TransferTest extends TestCase
{
    const ID = 1;

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_all_transfers()
    {
        $data = FootballApi::transfers()->all();
        $this->assertNotEmpty($data->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_a_transfer()
    {
        $data = FootballApi::transfers()->byId(self::ID);
        $this->assertNotEmpty($data->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_the_latest_transfers()
    {
        $data = FootballApi::transfers()->latest();
        $this->assertNotEmpty($data->data);
    }
}
