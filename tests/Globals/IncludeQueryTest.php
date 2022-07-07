<?php

namespace Globals;

use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use Sportmonks\FootballApi\FootballApi;
use TestCase;

class IncludeQueryTest extends TestCase
{
    const VALID_OPTIONS = ['continent', 'leagues', 'regions'];
    /**
     * @test
     * @throws GuzzleException
     */
    public function it_retrieves_with_include_option()
    {
        collect(self::VALID_OPTIONS)->each(function (string $include) {
            $data = FootballApi::countries()->all(['include' => $include]);
            $this->assertObjectHasAttribute('data', $data);
            $this->assertIsArray($data->data);
            $country = $data->data[0];
            $this->assertObjectHasAttribute($include, $country);
        });
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_allows_multiples_includes_as_array()
    {
        $data = FootballApi::countries()->all(['include' => self::VALID_OPTIONS]);
        $this->assertObjectHasAttribute('data', $data);
        $this->assertIsArray($data->data);
        $country = $data->data[0];

        collect(self::VALID_OPTIONS)->each(function ($include) use ($country) {
            $this->assertObjectHasAttribute($include, $country);
        });
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_allows_multiples_includes_as_string()
    {
        $includes = join(';', self::VALID_OPTIONS);
        $data = FootballApi::countries()->all(['include' => $includes]);
        $this->assertObjectHasAttribute('data', $data);
        $this->assertIsArray($data->data);
        $country = $data->data[0];

        collect(self::VALID_OPTIONS)->each(function ($include) use ($country) {
            $this->assertObjectHasAttribute($include, $country);
        });
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_throws_an_exception_if_non_semicolon_separated()
    {
        $this->expectException(ClientException::class);

        $includes = join(',', self::VALID_OPTIONS);
        FootballApi::countries()->all(['include' => $includes]);
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_also_working_if_send_as_includes()
    {
        $includes = join(';', self::VALID_OPTIONS);
        $data = FootballApi::countries()->all(['includes' => $includes]);
        $this->assertObjectHasAttribute('data', $data);
        $this->assertIsArray($data->data);
        $country = $data->data[0];

        collect(self::VALID_OPTIONS)->each(function ($include) use ($country) {
            $this->assertObjectHasAttribute($include, $country);
        });
    }

    /**
     * @test
     * @throws GuzzleException
     */
    public function it_throws_an_exception_if_include_does_not_exist()
    {
        $this->expectException(ClientException::class);
        FootballApi::countries()->all(['include' => ['ANOTHER_INCLUDE']]);
    }
}
