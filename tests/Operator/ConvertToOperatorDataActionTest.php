<?php

namespace Grixu\SociusClient\Tests\Operator;

use Grixu\SociusClient\Operator\Actions\ConvertToOperatorDataAction;
use Grixu\SociusClient\Operator\DataTransferObjects\OperatorDataCollection;
use Grixu\SociusClient\SociusClientServiceProvider;
use Grixu\SociusClient\Support\Tests\TestCallApi;
use Orchestra\Testbench\TestCase;

/**
 * Class ConvertToOperatorDataActionTest
 * @package Grixu\SociusClient\Tests\Operator
 */
class ConvertToOperatorDataActionTest extends TestCase
{
    private ConvertToOperatorDataAction $action;

    protected function setUp(): void
    {
        parent::setUp();

        $this->action = new ConvertToOperatorDataAction();
    }

    protected function getPackageProviders($app)
    {
        return [SociusClientServiceProvider::class];
    }

    /** @test */
    public function normal_pass()
    {
        $data = TestCallApi::forCollection(config('socius-client.base_url') . config('socius-client.modules.operator'));
        $result = $this->action->execute($data);

        $this->assertGreaterThan(0, $result->count());
        $this->assertEquals(OperatorDataCollection::class, get_class($result));
    }

    /** @test */
    public function with_role_included()
    {
        $data = TestCallApi::forCollection(config('socius-client.base_url') . config('socius-client.modules.operator') . '?include=role');
        $result = $this->action->execute($data);

        $this->assertGreaterThan(0, $result->count());
        $this->assertEquals(OperatorDataCollection::class, get_class($result));
    }

    /** @test */
    public function with_customers_included()
    {
        $data = TestCallApi::forCollection(config('socius-client.base_url') . config('socius-client.modules.operator') . '?include=customers');
        $result = $this->action->execute($data);

        $this->assertGreaterThan(0, $result->count());
        $this->assertEquals(OperatorDataCollection::class, get_class($result));
    }

    /** @test */
    public function with_branches_included()
    {
        $data = TestCallApi::forCollection(config('socius-client.base_url') . config('socius-client.modules.operator') . '?include=branches');
        $result = $this->action->execute($data);

        $this->assertGreaterThan(0, $result->count());
        $this->assertEquals(OperatorDataCollection::class, get_class($result));
    }
}
