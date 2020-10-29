<?php

namespace Grixu\SociusClient\Tests\Product;

use Grixu\SociusClient\Product\Actions\ParseProductTypeAction;
use Grixu\SociusClient\SociusClientServiceProvider;
use Grixu\SociusClient\Support\Tests\TestCallApi;
use Orchestra\Testbench\TestCase;

/**
 * Class ParseProductActionTest
 * @package Grixu\SociusClient\Tests\Product
 */
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

    /**
     * Test standard workflow
     *
     * @return void
     * @test
     */
    public function simple_case()
    {
        $data = TestCallApi::forSingle(config('socius-client.base_url') . config('socius-client.modules.product'));
        $result = $this->action->execute($data);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }

    /**
     * Test with brand relationship data included
     *
     * @return void
     * @test
     */
    public function with_brand_included()
    {
        $data = TestCallApi::forSingle(config('socius-client.base_url') . config('socius-client.modules.product') . '?include=brand');
        $result = $this->action->execute($data);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }

    /**
     * Test with product type relationship data included
     *
     * @return void
     * @test
     */
    public function with_product_type_included()
    {
        $data = TestCallApi::forSingle(config('socius-client.base_url') . config('socius-client.modules.product') . '?include=productType');
        $result = $this->action->execute($data);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }

    /**
     * Test with stocks relationship data included
     *
     * @return void
     * @test
     */
    public function with_stocks_included()
    {
        $data = TestCallApi::forSingle(config('socius-client.base_url') . config('socius-client.modules.product') . '?include=stocks');
        $result = $this->action->execute($data);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }

    /**
     * Test with descriptions relationship data included
     *
     * @return void
     * @test
     */
    public function with_descriptions_included()
    {
        $data = TestCallApi::forSingle(config('socius-client.base_url') . config('socius-client.modules.product') . '?include=descriptions');
        $result = $this->action->execute($data);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }
}
