<?php

namespace Requests;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApi;
use TestCase;

class CommentaryTest extends TestCase
{
    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_all_commentaries()
    {
        $data = FootballApi::commentaries()->all();
        $this->assertNotEmpty($data->data);
    }
}
