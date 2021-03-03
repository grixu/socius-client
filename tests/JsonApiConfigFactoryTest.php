<?php

namespace Grixu\SociusClient\Tests;

use Grixu\ApiClient\Config\JsonApiConfig;
use Grixu\SociusClient\JsonApiConfigFactory;
use Grixu\SociusClient\SociusClientServiceProvider;
use Orchestra\Testbench\TestCase;

class JsonApiConfigFactoryTest extends TestCase
{
    protected function getPackageProviders($app): array
    {
        return [SociusClientServiceProvider::class];
    }

    /** @test */
    public function it_creates_config_obj_for_module()
    {
        $returnedData = JsonApiConfigFactory::makeConfig('product');

        $this->assertEquals(JsonApiConfig::class, $returnedData::class);
    }

    /** @test */
    public function it_creates_config_obj_for_relationship()
    {
        $returnedData = JsonApiConfigFactory::makeBasicConfig();

        $this->assertEquals(JsonApiConfig::class, $returnedData::class);
    }
}
