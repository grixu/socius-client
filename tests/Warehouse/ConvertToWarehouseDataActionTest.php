<?php

namespace Grixu\SociusClient\Tests\Warehouse;

use Grixu\SociusClient\SociusClientServiceProvider;
use Grixu\SociusClient\Warehouse\Actions\ConvertToWarehouseDataAction;
use Grixu\SociusClient\Warehouse\DataTransferObjects\WarehouseDataCollection;
use Grixu\SociusClient\Support\Tests\TestCallApi;
use Orchestra\Testbench\TestCase;

/**
 * Class ConvertToWarehouseDataActionTest
 * @package Grixu\SociusClient\Tests\Warehouse
 */
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
        $result = $this->action->execute($data);

        $this->assertGreaterThan(0, $result->count());
        $this->assertEquals(WarehouseDataCollection::class, get_class($result));
    }

    /** @test */
    public function with_operator_included()
    {
        $data = TestCallApi::forCollection(config('socius-client.base_url') . config('socius-client.modules.warehouse') . '?include=operator');
        $result = $this->action->execute($data);

        $this->assertGreaterThan(0, $result->count());
        $this->assertEquals(WarehouseDataCollection::class, get_class($result));
    }

    /** @test */
    public function with_customer_included()
    {
        $data = TestCallApi::forCollection(config('socius-client.base_url') . config('socius-client.modules.warehouse') . '?include=customer');
        $result = $this->action->execute($data);

        $this->assertGreaterThan(0, $result->count());
        $this->assertEquals(WarehouseDataCollection::class, get_class($result));
    }

    /** @test */
    public function with_stocks_included()
    {
        $data = TestCallApi::forCollection(config('socius-client.base_url') . config('socius-client.modules.warehouse') . '?include=stocks');
        $result = $this->action->execute($data);

        $this->assertGreaterThan(0, $result->count());
        $this->assertEquals(WarehouseDataCollection::class, get_class($result));
    }
}
