<?php

namespace Grixu\SociusClient\Tests\Product;

use Grixu\SociusClient\Product\Actions\ConvertToBrandDataAction;
use Grixu\SociusClient\Product\DataTransferObjects\BrandDataCollection;
use Grixu\SociusClient\SociusClientServiceProvider;
use Grixu\SociusClient\Support\Tests\TestCallApi;
use Orchestra\Testbench\TestCase;

/**
 * Class ConvertToBrandDataActionTest
 * @package Grixu\SociusClient\Tests\Product
 */
class ConvertToBrandDataActionTest extends TestCase
{
    private ConvertToBrandDataAction $action;

    protected function setUp(): void
    {
        parent::setUp();

        $this->action = new ConvertToBrandDataAction();
    }

    protected function getPackageProviders($app)
    {
        return [SociusClientServiceProvider::class];
    }

    /** @test */
    public function normal_pass()
    {
        $data = TestCallApi::forCollection(config('socius-client.base_url') . config('socius-client.modules.brand'));
        $result = $this->action->execute($data);

        $this->assertGreaterThan(0, $result->count());
        $this->assertEquals(BrandDataCollection::class, get_class($result));
    }

    /** @test */
    public function with_products_included()
    {
        $data = TestCallApi::forCollection(config('socius-client.base_url') . config('socius-client.modules.brand') . '?include=products');
        $result = $this->action->execute($data);

        $this->assertGreaterThan(0, $result->count());
        $this->assertEquals(BrandDataCollection::class, get_class($result));
    }
}
