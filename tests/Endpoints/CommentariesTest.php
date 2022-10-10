<?php

namespace Endpoints;

use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApi;
use TestCase;

class CommentariesTest extends TestCase
{
    /**
     * @test
     * @throws GuzzleException
     */
    public function it_returns_commentaries_by_fixture ()
    {
        $data = FootballApi::commentaries()->byFixture(16924614)->data;

        $this->assertIsArray($data);
        $this->assertNotEmpty($data);

        $expected = 'Thats all. Game finished -  Wolverhampton Wanderers 1, Manchester City 3.';

        $this->assertEquals($expected, $data[0]->comment);
    }
}
