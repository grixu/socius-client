<?php

namespace Grixu\SociusClient\Tests\Product;

use Grixu\SociusClient\Product\Actions\ConvertToCategoryDataAction;
use Grixu\SociusClient\Product\DataTransferObjects\CategoryDataCollection;
use Grixu\SociusClient\SociusClientServiceProvider;
use Grixu\SociusClient\Support\Tests\TestCallApi;
use Orchestra\Testbench\TestCase;

class ConvertToCategoryDataActionTest extends TestCase
{
    private ConvertToCategoryDataAction $action;

    protected function setUp(): void
    {
        parent::setUp();

        $this->action = new ConvertToCategoryDataAction();
    }

    protected function getPackageProviders($app)
    {
        return [SociusClientServiceProvider::class];
    }

    /** @test */
    public function normal_pass()
    {
        $data = TestCallApi::forCollection(config('socius-client.base_url') . config('socius-client.modules.category'));
        $this->checkResults($data);
    }

    protected function checkResults($data)
    {
        $result = $this->action->execute($data);

        $this->assertGreaterThan(0, $result->count());
        $this->assertEquals(CategoryDataCollection::class, get_class($result));
    }

    /** @test */
    public function with_parent_included()
    {
        $data = TestCallApi::forCollection(config('socius-client.base_url') . config('socius-client.modules.category') . '?include=parent');
        $this->checkResults($data);
    }

    /** @test */
    public function with_children_included()
    {
        $data = TestCallApi::forCollection(config('socius-client.base_url') . config('socius-client.modules.category') . '?include=children');
        $this->checkResults($data);
    }
}
