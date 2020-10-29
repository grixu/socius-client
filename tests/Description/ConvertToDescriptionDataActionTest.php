<?php

namespace Grixu\SociusClient\Tests\Description;

use Grixu\SociusClient\Description\Actions\ConvertToDescriptionDataAction;
use Grixu\SociusClient\Description\DataTransferObjects\ProductDescriptionDataCollection;
use Grixu\SociusClient\SociusClientServiceProvider;
use Grixu\SociusClient\Support\Tests\TestCallApi;
use Orchestra\Testbench\TestCase;

/**
 * Class ConvertToDescriptionDataActionTest
 * @package Grixu\SociusClient\Tests\Description
 */
class ConvertToDescriptionDataActionTest extends TestCase
{
    private ConvertToDescriptionDataAction $action;

    protected function setUp(): void
    {
        parent::setUp();

        $this->action = new ConvertToDescriptionDataAction();
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
        $data = TestCallApi::forCollection(config('socius-client.base_url') . config('socius-client.modules.description'));
        $result = $this->action->execute($data);

        $this->assertGreaterThan(0, $result->count());
        $this->assertEquals(ProductDescriptionDataCollection::class, get_class($result));
    }

    /**
     * Test with language included
     *
     * @return void
     * @test
     */
    public function with_language_included()
    {
        $data = TestCallApi::forCollection(config('socius-client.base_url') . config('socius-client.modules.description') . '?include=language');
        $result = $this->action->execute($data);

        $this->assertGreaterThan(0, $result->count());
        $this->assertEquals(ProductDescriptionDataCollection::class, get_class($result));
    }

    /**
     * Test with product included
     *
     * @return void
     * @test
     */
    public function with_product_included()
    {
        $data = TestCallApi::forCollection(config('socius-client.base_url') . config('socius-client.modules.description') . '?include=product');
        $result = $this->action->execute($data);

        $this->assertGreaterThan(0, $result->count());
        $this->assertEquals(ProductDescriptionDataCollection::class, get_class($result));
    }
}
