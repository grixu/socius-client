<?php

namespace Grixu\SociusClient\Tests;

use Grixu\ApiClient\ApiClientServiceProvider;
use Grixu\ApiClient\JsonApiFetcher;
use Grixu\SociusClient\SociusClient;
use Grixu\SociusClient\SociusClientServiceProvider;
use Orchestra\Testbench\TestCase;

class SociusClientTest extends TestCase
{
    protected SociusClient $obj;

    protected function setUp(): void
    {
        parent::setUp();

        $this->obj = new SociusClient();
    }

    protected function getPackageProviders($app): array
    {
        return [SociusClientServiceProvider::class, ApiClientServiceProvider::class];
    }

    /** @test */
    public function it_creates_json_fetcher()
    {
        $returnedValue = $this->obj->product();

        $this->assertEquals(JsonApiFetcher::class, $returnedValue::class);
    }

    /** @test */
    public function it_throw_exception_when_module_name_is_not_exist_in_config()
    {
        try {
            $this->obj->nonExists();
            $this->assertTrue(false);
        } catch (\Exception) {
            $this->assertTrue(true);
        }
    }

    /**
     * @test
     * @environment-setup missingUrlConfig
     */
    public function it_throw_exception_when_url_path_is_missing_in_config_block()
    {
        $this->runProductMethod();
    }

    protected function missingUrlConfig($app)
    {
        $app->config->set('socius-client.product.url', null);
    }

    protected function runProductMethod()
    {
        try {
            $this->obj->product();
            $this->assertTrue(false);
        } catch (\Exception) {
            $this->assertTrue(true);
        }
    }

    /**
     * @test
     * @environment-setup missingFiltersConfig
     */
    public function it_throw_exception_when_filters_are_missing_in_config_block()
    {
        $this->runProductMethod();
    }

    protected function missingFiltersConfig($app)
    {
        $app->config->set('socius-client.product.filters', null);
    }

    /**
     * @test
     * @environment-setup missingIncludesConfig
     */
    public function it_throw_exception_when_includes_are_missing_in_config_block()
    {
        $this->runProductMethod();
    }

    protected function missingIncludesConfig($app)
    {
        $app->config->set('socius-client.product.includes', null);
    }

    /**
     * @test
     * @environment-setup missingSortsConfig
     */
    public function it_throw_exception_when_sorts_are_missing_in_config_block()
    {
        $this->runProductMethod();
    }

    protected function missingSortsConfig($app)
    {
        $app->config->set('socius-client.product.sorts', null);
    }
}
