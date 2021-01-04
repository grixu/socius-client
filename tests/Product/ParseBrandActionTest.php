<?php

namespace Grixu\SociusClient\Tests\Product;

use Grixu\SociusClient\Product\Actions\ParseBrandAction;
use Grixu\SociusClient\SociusClientServiceProvider;
use Grixu\SociusClient\Support\Tests\TestCallApi;
use Orchestra\Testbench\TestCase;

class ParseBrandActionTest extends TestCase
{
    private ParseBrandAction $action;

    protected function setUp(): void
    {
        parent::setUp();

        $this->action = new ParseBrandAction();
    }

    protected function getPackageProviders($app)
    {
        return [SociusClientServiceProvider::class];
    }

    /** @test */
    public function normal_pass()
    {
        $data = TestCallApi::forSingle(config('socius-client.base_url') . config('socius-client.modules.brand'));
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
        $data = TestCallApi::forSingle(config('socius-client.base_url') . config('socius-client.modules.brand') . '?include=products');
        $this->checkResults($data);
    }
}
