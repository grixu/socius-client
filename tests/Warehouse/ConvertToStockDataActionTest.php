<?php

namespace Grixu\SociusClient\Tests\Warehouse;

use Grixu\SociusClient\SociusClientServiceProvider;
use Grixu\SociusClient\Warehouse\Actions\ConvertToStockDataAction;
use Grixu\SociusClient\Warehouse\DataTransferObjects\StockDataCollection;
use Grixu\SociusClient\Tests\Helpers\TestCallApi;
use Orchestra\Testbench\TestCase;

class ConvertToStockDataActionTest extends TestCase
{
    private ConvertToStockDataAction $action;

    protected function setUp(): void
    {
        parent::setUp();

        $this->action = new ConvertToStockDataAction();
    }

    protected function getPackageProviders($app)
    {
        return [SociusClientServiceProvider::class];
    }

    /** @test */
    public function normal_pass()
    {
        $data = TestCallApi::forCollection(config('socius-client.base_url') . config('socius-client.modules.stock'));
        $this->checkResults($data);
    }

    protected function checkResults(array $data)
    {
        $result = $this->action->execute($data);

        $this->assertGreaterThan(0, $result->count());
        $this->assertEquals(StockDataCollection::class, get_class($result));
    }

    /** @test */
    public function with_product_included()
    {
        $data = TestCallApi::forCollection(config('socius-client.base_url') . config('socius-client.modules.stock') . '?included=product');
        $this->checkResults($data);
    }

    /** @test */
    public function with_warehouse_included()
    {
        $data = TestCallApi::forCollection(config('socius-client.base_url') . config('socius-client.modules.stock') . '?included=warehouse');
        $this->checkResults($data);
    }
}
