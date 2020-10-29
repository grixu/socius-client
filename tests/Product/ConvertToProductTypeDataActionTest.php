<?php

namespace Grixu\SociusClient\Tests\Product;

use Grixu\SociusClient\Product\Actions\ConvertToProductTypeDataAction;
use Grixu\SociusClient\Product\DataTransferObjects\ProductTypeDataCollection;
use Grixu\SociusClient\SociusClientServiceProvider;
use Grixu\SociusClient\Support\Tests\TestCallApi;
use Orchestra\Testbench\TestCase;

/**
 * Class ConvertToProductTypeDataActionTest
 * @package Grixu\SociusClient\Tests\Product
 */
class ConvertToProductTypeDataActionTest extends TestCase
{
    private ConvertToProductTypeDataAction $action;

    protected function setUp(): void
    {
        parent::setUp();

        $this->action = new ConvertToProductTypeDataAction();
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
        $data = TestCallApi::forCollection(config('socius-client.base_url') . config('socius-client.modules.product_type'));
        $result = $this->action->execute($data);

        $this->assertGreaterThan(0, $result->count());
        $this->assertEquals(ProductTypeDataCollection::class, get_class($result));
    }

    /**
     * Test with products relationship data included
     *
     * @return void
     * @test
     */
    public function with_products_included()
    {
        $data = TestCallApi::forCollection(config('socius-client.base_url') . config('socius-client.modules.product_type') . '?include=products');
        $result = $this->action->execute($data);

        $this->assertGreaterThan(0, $result->count());
        $this->assertEquals(ProductTypeDataCollection::class, get_class($result));
    }
}
