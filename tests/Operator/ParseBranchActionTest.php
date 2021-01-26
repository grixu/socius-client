<?php

namespace Grixu\SociusClient\Tests\Operator;

use Grixu\SociusClient\Operator\Actions\ParseBranchAction;
use Grixu\SociusClient\SociusClientServiceProvider;
use Grixu\SociusClient\Tests\Helpers\TestCallApi;
use Orchestra\Testbench\TestCase;

class ParseBranchActionTest extends TestCase
{
    private ParseBranchAction $action;

    protected function setUp(): void
    {
        parent::setUp();

        $this->action = new ParseBranchAction();
    }

    protected function getPackageProviders($app)
    {
        return [SociusClientServiceProvider::class];
    }

    /** @test */
    public function normal_pass()
    {
        $data = TestCallApi::forSingle(config('socius-client.base_url') . config('socius-client.modules.branch'));
        $this->checkResults($data);
    }

    protected function checkResults($data)
    {
        $result = $this->action->execute($data);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }

    /** @test */
    public function with_operators()
    {
        $data = TestCallApi::forSingle(config('socius-client.base_url') . config('socius-client.modules.branch') . '?include=operators');
        $this->checkResults($data);
    }
}
