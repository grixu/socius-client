<?php

namespace Grixu\SociusClient\Tests\Product;

use Grixu\SociusClient\Product\Actions\ParseProductTypeAction;
use Grixu\SociusClient\SociusClientServiceProvider;
use Grixu\SociusClient\Support\Tests\TestCallApi;
use Orchestra\Testbench\TestCase;

class ParseProductActionTest extends TestCase
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
        $data = TestCallApi::forSingle(config('socius-client.base_url') . config('socius-client.modules.product'));
        $this->checkResults($data);
    }

    protected function checkResults(array $data)
    {
        $result = $this->action->execute($data);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }

    /** @test */
    public function with_brand_included()
    {
        $data = TestCallApi::forSingle(config('socius-client.base_url') . config('socius-client.modules.product') . '?include=brand');
        $this->checkResults($data);
    }

    /** @test */
    public function with_product_type_included()
    {
        $data = TestCallApi::forSingle(config('socius-client.base_url') . config('socius-client.modules.product') . '?include=productType');
        $this->checkResults($data);
    }

    /** @test */
    public function with_stocks_included()
    {
        $data = TestCallApi::forSingle(config('socius-client.base_url') . config('socius-client.modules.product') . '?include=stocks');
        $this->checkResults($data);
    }

    /** @test */
    public function with_descriptions_included()
    {
        $data = TestCallApi::forSingle(config('socius-client.base_url') . config('socius-client.modules.product') . '?include=descriptions');
        $this->checkResults($data);
    }
}
