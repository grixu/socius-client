<?php

namespace Grixu\SociusClient\Tests\Product;

use Grixu\SociusClient\Product\Actions\ParseBrandAction;
use Grixu\SociusClient\SociusClientServiceProvider;
use Grixu\SociusClient\Support\Tests\TestCallApi;
use Orchestra\Testbench\TestCase;

/**
 * Class ParseBrandActionTest
 * @package Grixu\SociusClient\Tests\Product
 */
class ParseBrandActionTest extends TestCase
{
    private ParseBrandAction $action;

    protected function setUp(): void
    {
        parent::setUp();

        $this->action = new ParseBrandAction();
    }

    protected function getPackageProviders($app)
    {
        return [SociusClientServiceProvider::class];
    }

    /**
     * Test standard workflow
     *
     * @return void
     * @test
     */
    public function simple_case()
    {
        $data = TestCallApi::forSingle(config('socius-client.base_url') . config('socius-client.modules.brand'));
        $result = $this->action->execute($data);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }

    /**
     * Test with products included
     *
     * @return void
     * @test
     */
    public function with_products_included()
    {
        $data = TestCallApi::forSingle(config('socius-client.base_url') . config('socius-client.modules.brand') . '?include=products');
        $result = $this->action->execute($data);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }
}
