<?php

namespace Grixu\SociusClient\Tests;

use Grixu\ApiClient\ApiClientServiceProvider;
use Grixu\ApiClient\JsonApiFetcher;
use Grixu\SociusClient\SociusClientFacade;
use Grixu\SociusClient\SociusClientServiceProvider;
use Orchestra\Testbench\TestCase;

class SociusClientFacadeTest extends TestCase
{
    protected function getPackageProviders($app): array
    {
        return [SociusClientServiceProvider::class, ApiClientServiceProvider::class];
    }

    /** @test */
    public function it_return_json_api_fetcher()
    {
        $returnedObj = SociusClientFacade::product();

        $this->assertEquals(JsonApiFetcher::class, $returnedObj::class);
    }
}
