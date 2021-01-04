<?php

namespace Grixu\SociusClient\Tests\Operator;

use Grixu\SociusClient\Operator\Actions\ParseOperatorRoleAction;
use Grixu\SociusClient\SociusClientServiceProvider;
use Grixu\SociusClient\Support\Tests\TestCallApi;
use Orchestra\Testbench\TestCase;

class ParseOperatorRoleActionTest extends TestCase
{
    private ParseOperatorRoleAction $action;

    protected function setUp(): void
    {
        parent::setUp();

        $this->action = new ParseOperatorRoleAction();
    }

    protected function getPackageProviders($app)
    {
        return [SociusClientServiceProvider::class];
    }

    /** @test */
    public function normal_pass()
    {
        $data = TestCallApi::forSingle(config('socius-client.base_url') . config('socius-client.modules.operator_role'));
        $this->checkResults($data);
    }

    protected function checkResults($data)
    {
        $result = $this->action->execute($data);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }

    /** @test */
    public function with_operators_included()
    {
        $data = TestCallApi::forSingle(config('socius-client.base_url') . config('socius-client.modules.operator_role') . '?include=operators');
        $this->checkResults($data);
    }
}
