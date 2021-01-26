<?php

namespace Grixu\SociusClient\Tests\Warehouse;

use Grixu\SociusClient\SociusClientServiceProvider;
use Grixu\SociusClient\Warehouse\Actions\ParseStockAction;
use Grixu\SociusClient\Tests\Helpers\TestCallApi;
use Orchestra\Testbench\TestCase;

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
        $this->checkResults($data);
    }

    protected function checkResults(array $data)
    {
        $result = $this->action->execute($data);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }

    /** @test */
    public function with_product_included()
    {
        $data = TestCallApi::forSingle(config('socius-client.base_url') . config('socius-client.modules.stock') . '?include=product');
        ray($data);
        $this->checkResults($data);
    }

    /** @test */
    public function with_warehouse_included()
    {
        $data = TestCallApi::forSingle(config('socius-client.base_url') . config('socius-client.modules.stock') . '?include=warehouse');
        $this->checkResults($data);
    }
}
