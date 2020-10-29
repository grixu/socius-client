<?php

namespace Grixu\SociusClient\Tests\Description;

use Grixu\SociusClient\Description\Actions\ParseDescriptionAction;
use Grixu\SociusClient\SociusClientServiceProvider;
use Grixu\SociusClient\Support\Tests\TestCallApi;
use Orchestra\Testbench\TestCase;

/**
 * Class ParseDescriptionActionTest
 * @package Grixu\SociusClient\Tests\Description
 */
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

    /**
     * Test standard workflow
     *
     * @return void
     * @test
     */
    public function simple_case()
    {
        $data = TestCallApi::forSingle(config('socius-client.base_url') . config('socius-client.modules.description'));
        $result = $this->action->execute($data);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }

    /**
     * Test with language included
     *
     * @return void
     * @test
     */
    public function with_language_included()
    {
        $data = TestCallApi::forSingle(config('socius-client.base_url') . config('socius-client.modules.description') . '?include=language');
        $result = $this->action->execute($data);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }

    /**
     * Test with product included
     *
     * @return void
     * @test
     */
    public function with_product_included()
    {
        $data = TestCallApi::forSingle(config('socius-client.base_url') . config('socius-client.modules.description') . '?include=product');
        $result = $this->action->execute($data);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }
}
