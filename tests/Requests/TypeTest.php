<?php

namespace Requests;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApi;
use TestCase;

class TypeTest extends TestCase
{
    const ID = 1;

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_all_types()
    {
        $data = FootballApi::types()->all();
        $this->assertNotEmpty($data->data);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_a_type()
    {
        $data = FootballApi::types()->byId(self::ID);
        $this->assertNotEmpty($data->data);
    }
}
