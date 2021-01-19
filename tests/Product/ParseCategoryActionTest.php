<?php

namespace Grixu\SociusClient\Tests\Product;

use Grixu\SociusClient\Product\Actions\ParseCategoryAction;
use Grixu\SociusClient\SociusClientServiceProvider;
use Grixu\SociusClient\Tests\Helpers\TestCallApi;
use Orchestra\Testbench\TestCase;

class ParseCategoryActionTest extends TestCase
{
    private ParseCategoryAction $action;

    protected function setUp(): void
    {
        parent::setUp();

        $this->action = new ParseCategoryAction();
    }

    protected function getPackageProviders($app)
    {
        return [SociusClientServiceProvider::class];
    }

    /** @test */
    public function normal_pass()
    {
        $data = TestCallApi::forSingle(config('socius-client.base_url') . config('socius-client.modules.category'));
        $this->checkResults($data);
    }

    protected function checkResults(array $data)
    {
        $result = $this->action->execute($data);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }

    /** @test */
    public function with_parent_included()
    {
        $data = TestCallApi::forSingle(config('socius-client.base_url') . config('socius-client.modules.category') . '?include=parent');
        $this->checkResults($data);
    }

    /** @test */
    public function with_children_included()
    {
        $data = TestCallApi::forSingle(config('socius-client.base_url') . config('socius-client.modules.category') . '?include=children');
        $this->checkResults($data);
    }
}
