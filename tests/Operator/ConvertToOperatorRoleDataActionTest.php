<?php

namespace Grixu\SociusClient\Tests\Operator;

use Grixu\SociusClient\Operator\Actions\ConvertToOperatorRoleDataAction;
use Grixu\SociusClient\Operator\DataTransferObjects\OperatorRoleDataCollection;
use Grixu\SociusClient\SociusClientServiceProvider;
use Grixu\SociusClient\Support\Tests\TestCallApi;
use Orchestra\Testbench\TestCase;

/**
 * Class ConvertToOperatorRoleDataActionTest
 * @package Grixu\SociusClient\Tests\Operator
 */
class ConvertToOperatorRoleDataActionTest extends TestCase
{
    private ConvertToOperatorRoleDataAction $action;

    protected function setUp(): void
    {
        parent::setUp();

        $this->action = new ConvertToOperatorRoleDataAction();
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
        $data = TestCallApi::forCollection(config('socius-client.base_url') . config('socius-client.modules.operator_role'));
        $result = $this->action->execute($data);

        $this->assertGreaterThan(0, $result->count());
        $this->assertEquals(OperatorRoleDataCollection::class, get_class($result));
    }

    /**
     * Test with operators included
     *
     * @return void
     * @test
     */
    public function with_operators_included()
    {
        $data = TestCallApi::forCollection(config('socius-client.base_url') . config('socius-client.modules.operator_role') . '?include=operators');
        $result = $this->action->execute($data);

        $this->assertGreaterThan(0, $result->count());
        $this->assertEquals(OperatorRoleDataCollection::class, get_class($result));
    }
}
