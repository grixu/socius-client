<?php

namespace Grixu\SociusClient\Tests\Product;

use Grixu\SociusClient\Product\Actions\ConvertToProductDataAction;
use Grixu\SociusClient\Product\DataTransferObjects\ProductDataCollection;
use Grixu\SociusClient\SociusClientServiceProvider;
use Grixu\SociusClient\Support\Tests\TestCallApi;
use Orchestra\Testbench\TestCase;

/**
 * Class ConvertToProductDataActionTest
 * @package Grixu\SociusClient\Tests\Product
 */
class ConvertToProductDataActionTest extends TestCase
{
    private ConvertToProductDataAction $action;

    protected function setUp(): void
    {
        parent::setUp();

        $this->action = new ConvertToProductDataAction();
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
        $data = TestCallApi::forCollection(config('socius-client.base_url') . config('socius-client.modules.product'));
        $result = $this->action->execute($data);

        $this->assertGreaterThan(0, $result->count());
        $this->assertEquals(ProductDataCollection::class, get_class($result));
    }

    /**
     * Test with brand relationship data included
     *
     * @return void
     * @test
     */
    public function with_brand_included()
    {
        $data = TestCallApi::forCollection(config('socius-client.base_url') . config('socius-client.modules.product') . '?include=brand');
        $result = $this->action->execute($data);

        $this->assertGreaterThan(0, $result->count());
        $this->assertEquals(ProductDataCollection::class, get_class($result));
    }

    /**
     * Test with productType relationship data included
     *
     * @return void
     * @test
     */
    public function with_product_included()
    {
        $data = TestCallApi::forCollection(config('socius-client.base_url') . config('socius-client.modules.product') . '?include=productType');
        $result = $this->action->execute($data);

        $this->assertGreaterThan(0, $result->count());
        $this->assertEquals(ProductDataCollection::class, get_class($result));
    }

    /**
     * Test with stocks relationship data included
     *
     * @return void
     * @test
     */
    public function with_stocks_included()
    {
        $data = TestCallApi::forCollection(config('socius-client.base_url') . config('socius-client.modules.product') . '?include=stocks');
        $result = $this->action->execute($data);

        $this->assertGreaterThan(0, $result->count());
        $this->assertEquals(ProductDataCollection::class, get_class($result));
    }

    /**
     * Test with products relationship data included
     *
     * @return void
     * @test
     */
    public function with_descriptions_included()
    {
        $data = TestCallApi::forCollection(config('socius-client.base_url') . config('socius-client.modules.product') . '?include=descriptions');
        $result = $this->action->execute($data);

        $this->assertGreaterThan(0, $result->count());
        $this->assertEquals(ProductDataCollection::class, get_class($result));
    }
}
