<?php

namespace Grixu\SociusClient\Tests\Description;

use Grixu\SociusClient\Description\Actions\ConvertToDescriptionDataAction;
use Grixu\SociusClient\Description\DataTransferObjects\ProductDescriptionDataCollection;
use Grixu\SociusClient\SociusClientServiceProvider;
use Grixu\SociusClient\Tests\Helpers\TestCallApi;
use Orchestra\Testbench\TestCase;

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

    /** @test */
    public function normal_pass()
    {
        $data = TestCallApi::forCollection(config('socius-client.modules.description'));
        $this->checkResults($data);
    }

    protected function checkResults($data)
    {
        $result = $this->action->execute($data);

        $this->assertGreaterThan(0, $result->count());
        $this->assertEquals(ProductDescriptionDataCollection::class, get_class($result));
    }

    /** @test */
    public function with_language_included()
    {
        $data = TestCallApi::forCollection(config('socius-client.modules.description') . '?include=language');
        $this->checkResults($data);
    }

    /** @test */
    public function with_product_included()
    {
        $data = TestCallApi::forCollection(config('socius-client.modules.description') . '?include=product');
        $this->checkResults($data);
    }
}
