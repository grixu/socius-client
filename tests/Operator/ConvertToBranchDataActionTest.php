<?php

namespace Grixu\SociusClient\Tests\Operator;

use Grixu\SociusClient\Operator\Actions\ConvertToBranchDataAction;
use Grixu\SociusClient\Operator\DataTransferObjects\BranchDataCollection;
use Grixu\SociusClient\SociusClientServiceProvider;
use Grixu\SociusClient\Support\Tests\TestCallApi;
use Orchestra\Testbench\TestCase;

/**
 * Class ConvertToBranchDataTest
 * @package Grixu\SociusClient\Tests\Operator
 */
class ConvertToBranchDataActionTest extends TestCase
{
    private ConvertToBranchDataAction $action;

    protected function setUp(): void
    {
        parent::setUp();

        $this->action = new ConvertToBranchDataAction();
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
        $data = TestCallApi::forCollection(config('socius-client.base_url') . config('socius-client.modules.branch'));
        $result = $this->action->execute($data);

        $this->assertGreaterThan(0, $result->count());
        $this->assertEquals(BranchDataCollection::class, get_class($result));
    }

    /**
     * Test with operators included
     *
     * @return void
     * @test
     */
    public function with_operators_included()
    {
        $data = TestCallApi::forCollection(config('socius-client.base_url') . config('socius-client.modules.branch') . '?include=operators');
        $result = $this->action->execute($data);

        $this->assertGreaterThan(0, $result->count());
        $this->assertEquals(BranchDataCollection::class, get_class($result));
    }
}
