<?php

namespace Grixu\SociusClient\Tests\Warehouse;

use Grixu\SociusClient\SociusClientServiceProvider;
use Grixu\SociusClient\Warehouse\Actions\ConvertToWarehouseDataAction;
use Grixu\SociusClient\Warehouse\DataTransferObjects\WarehouseDataCollection;
use Grixu\SociusClient\Tests\Helpers\TestCallApi;
use Orchestra\Testbench\TestCase;

class ConvertToWarehouseDataActionTest extends TestCase
{
    private ConvertToWarehouseDataAction $action;

    protected function setUp(): void
    {
        parent::setUp();

        $this->action = new ConvertToWarehouseDataAction();
    }

    protected function getPackageProviders($app)
    {
        return [SociusClientServiceProvider::class];
    }

    /** @test */
    public function normal_pass()
    {
        $data = TestCallApi::forCollection(config('socius-client.base_url') . config('socius-client.modules.warehouse'));
        $this->checkResults($data);
    }

    protected function checkResults(array $data)
    {
        $result = $this->action->execute($data);

        $this->assertGreaterThan(0, $result->count());
        $this->assertEquals(WarehouseDataCollection::class, get_class($result));
    }

    /** @test */
    public function with_operator_included()
    {
        $data = TestCallApi::forCollection(config('socius-client.base_url') . config('socius-client.modules.warehouse') . '?include=operator');
        $this->checkResults($data);
    }

    /** @test */
    public function with_customer_included()
    {
        $data = TestCallApi::forCollection(config('socius-client.base_url') . config('socius-client.modules.warehouse') . '?include=customer');
        $this->checkResults($data);
    }

    /** @test */
    public function with_stocks_included()
    {
        $data = TestCallApi::forCollection(config('socius-client.base_url') . config('socius-client.modules.warehouse') . '?include=stocks');
        $this->checkResults($data);
    }
}
