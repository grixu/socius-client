<?php

namespace Grixu\SociusClient\Tests\Warehouse;

use Grixu\SociusClient\SociusClientServiceProvider;
use Grixu\SociusClient\Warehouse\Actions\ParseStockAction;
use Grixu\SociusClient\Support\Tests\TestCallApi;
use Orchestra\Testbench\TestCase;

/**
 * Class ParseStockActionTest
 * @package Grixu\SociusClient\Tests\Warehouse
 */
class ParseStockActionTest extends TestCase
{
    private ParseStockAction $action;

    protected function setUp(): void
    {
        parent::setUp();

        $this->action = new ParseStockAction();
    }

    protected function getPackageProviders($app)
    {
        return [SociusClientServiceProvider::class];
    }

    /** @test */
    public function normal_pass()
    {
        $data = TestCallApi::forSingle(config('socius-client.base_url') . config('socius-client.modules.stock'));
        $result = $this->action->execute($data);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }

    /** @test */
    public function with_product_included()
    {
        $data = TestCallApi::forSingle(config('socius-client.base_url') . config('socius-client.modules.stock') . '?include=product');
        $result = $this->action->execute($data);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }

    /** @test */
    public function with_warehouse_included()
    {
        $data = TestCallApi::forSingle(config('socius-client.base_url') . config('socius-client.modules.stock') . '?include=warehouse');
        $result = $this->action->execute($data);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }
}
