<?php

namespace Grixu\SociusClient\Tests\Product;

use Grixu\SociusClient\Product\Actions\ConvertToProductTypeDataAction;
use Grixu\SociusClient\Product\DataTransferObjects\ProductTypeDataCollection;
use Grixu\SociusClient\SociusClientServiceProvider;
use Grixu\SociusClient\Support\Tests\TestCallApi;
use Orchestra\Testbench\TestCase;

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

    /** @test */
    public function normal_pass()
    {
        $data = TestCallApi::forCollection(config('socius-client.base_url') . config('socius-client.modules.product_type'));
        $this->checkResults($data);
    }

    protected function checkResults($data)
    {
        $result = $this->action->execute($data);

        $this->assertGreaterThan(0, $result->count());
        $this->assertEquals(ProductTypeDataCollection::class, get_class($result));
    }

    /** @test */
    public function with_products_included()
    {
        $data = TestCallApi::forCollection(config('socius-client.base_url') . config('socius-client.modules.product_type') . '?include=products');
        $this->checkResults($data);
    }
}
