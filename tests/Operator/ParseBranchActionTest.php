<?php

namespace Grixu\SociusClient\Tests\Operator;

use Grixu\SociusClient\Operator\Actions\ParseBranchAction;
use Grixu\SociusClient\SociusClientServiceProvider;
use Grixu\SociusClient\Support\Tests\TestCallApi;
use Orchestra\Testbench\TestCase;

/**
 * Class ParseBranchActionTest
 * @package Grixu\SociusClient\Tests\Operator
 */
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
        $result = $this->action->execute($data);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }

    /** @test */
    public function with_operators()
    {
        $data = TestCallApi::forSingle(config('socius-client.base_url') . config('socius-client.modules.branch') . '?include=operators');
        $result = $this->action->execute($data);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }
}
