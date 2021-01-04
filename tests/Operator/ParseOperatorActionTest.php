<?php

namespace Grixu\SociusClient\Tests\Operator;

use Grixu\SociusClient\Operator\Actions\ParseOperatorAction;
use Grixu\SociusClient\SociusClientServiceProvider;
use Grixu\SociusClient\Support\Tests\TestCallApi;
use Orchestra\Testbench\TestCase;

class ParseOperatorActionTest extends TestCase
{
    private ParseOperatorAction $action;

    protected function setUp(): void
    {
        parent::setUp();

        $this->action = new ParseOperatorAction();
    }

    protected function getPackageProviders($app)
    {
        return [SociusClientServiceProvider::class];
    }

    /** @test */
    public function normal_pass()
    {
        $data = TestCallApi::forSingle(config('socius-client.base_url') . config('socius-client.modules.operator'));
        $this->checkResults($data);
    }

    protected function checkResults($data)
    {
        $result = $this->action->execute($data);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }

    /** @test */
    public function with_role_included()
    {
        $data = TestCallApi::forSingle(config('socius-client.base_url') . config('socius-client.modules.operator') . '?include=role');
        $this->checkResults($data);
    }

    /** @test */
    public function with_customers_included()
    {
        $data = TestCallApi::forSingle(config('socius-client.base_url') . config('socius-client.modules.operator') . '?include=customers');
        $this->checkResults($data);
    }

    /** @test */
    public function with_branches_included()
    {
        $data = TestCallApi::forSingle(config('socius-client.base_url') . config('socius-client.modules.operator') . '?include=branches');
        $this->checkResults($data);
    }
}
