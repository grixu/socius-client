<?php

namespace Grixu\SociusClient\Tests\Description;

use Grixu\SociusClient\Description\Actions\ParseDescriptionAction;
use Grixu\SociusClient\SociusClientServiceProvider;
use Grixu\SociusClient\Tests\Helpers\TestCallApi;
use Orchestra\Testbench\TestCase;

class ParseDescriptionActionTest extends TestCase
{
    private ParseDescriptionAction $action;

    protected function setUp(): void
    {
        parent::setUp();

        $this->action = new ParseDescriptionAction();
    }

    protected function getPackageProviders($app)
    {
        return [SociusClientServiceProvider::class];
    }

    /** @test */
    public function normal_pass()
    {
        $data = TestCallApi::forSingle(config('socius-client.base_url') . config('socius-client.modules.description'));
        $this->checkResults($data);
    }

    public function checkResults($data)
    {
        $result = $this->action->execute($data);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }

    /** @test */
    public function with_language_included()
    {
        $data = TestCallApi::forSingle(config('socius-client.base_url') . config('socius-client.modules.description') . '?include=language');
        $this->checkResults($data);
    }

    /** @test */
    public function with_product_included()
    {
        $data = TestCallApi::forSingle(config('socius-client.base_url') . config('socius-client.modules.description') . '?include=product');
        $this->checkResults($data);
    }
}
