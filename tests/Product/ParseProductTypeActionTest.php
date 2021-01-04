<?php

namespace Grixu\SociusClient\Tests\Product;

use Grixu\SociusClient\Product\Actions\ParseProductTypeAction;
use Grixu\SociusClient\SociusClientServiceProvider;
use Grixu\SociusClient\Support\Tests\TestCallApi;
use Orchestra\Testbench\TestCase;

class ParseProductTypeActionTest extends TestCase
{
    private ParseProductTypeAction $action;

    protected function setUp(): void
    {
        parent::setUp();

        $this->action = new ParseProductTypeAction();
    }

    protected function getPackageProviders($app)
    {
        return [SociusClientServiceProvider::class];
    }

    /** @test */
    public function normal_pass()
    {
        $data = TestCallApi::forSingle(config('socius-client.base_url') . config('socius-client.modules.product_type'));
        $this->checkResults($data);
    }

    protected function checkResults($data)
    {
        $result = $this->action->execute($data);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }

    /** @test */
    public function with_products_included()
    {
        $data = TestCallApi::forSingle(config('socius-client.base_url') . config('socius-client.modules.product_type') . '?include=products');
        $this->checkResults($data);
    }
}
