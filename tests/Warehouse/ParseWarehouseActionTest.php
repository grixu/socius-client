<?php

namespace Grixu\SociusClient\Tests\Warehouse;

use Grixu\SociusClient\SociusClientServiceProvider;
use Grixu\SociusClient\Warehouse\Actions\ParseWarehouseAction;
use Grixu\SociusClient\Support\Tests\TestCallApi;
use Orchestra\Testbench\TestCase;

/**
 * Class ParseWarehouseActionTest
 * @package Grixu\SociusClient\Tests\Warehouse
 */
class ParseWarehouseActionTest extends TestCase
{
    private ParseWarehouseAction $action;

    protected function setUp(): void
    {
        parent::setUp();

        $this->action = new ParseWarehouseAction();
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
        $data = TestCallApi::forSingle(config('socius-client.base_url') . config('socius-client.modules.warehouse'));
        $result = $this->action->execute($data);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }

    /**
     * Test with included operator relationship data
     *
     * @return void
     * @test
     */
    public function with_operator_included()
    {
        $data = TestCallApi::forSingle(config('socius-client.base_url') . config('socius-client.modules.warehouse') . '?include=operator');
        $result = $this->action->execute($data);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }

    /**
     * Test with included customer relationship data
     *
     * @return void
     * @test
     */
    public function with_customer_included()
    {
        $data = TestCallApi::forSingle(config('socius-client.base_url') . config('socius-client.modules.warehouse') . '?include=customer');
        $result = $this->action->execute($data);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }

    /**
     * Test with included stocks relationship data
     *
     * @return void
     * @test
     */
    public function with_stocks_included()
    {
        $data = TestCallApi::forSingle(config('socius-client.base_url') . config('socius-client.modules.warehouse') . '?include=stocks');
        $result = $this->action->execute($data);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }
}
