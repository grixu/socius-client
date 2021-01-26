<?php

namespace Grixu\SociusClient\Tests\Operator;

use Grixu\SociusClient\Operator\Actions\ConvertToOperatorDataAction;
use Grixu\SociusClient\Operator\DataTransferObjects\OperatorDataCollection;
use Grixu\SociusClient\SociusClientServiceProvider;
use Grixu\SociusClient\Tests\Helpers\TestCallApi;
use Orchestra\Testbench\TestCase;

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
        $this->checkResults($data);
    }

    protected function checkResults($data)
    {
        $result = $this->action->execute($data);

        $this->assertGreaterThan(0, $result->count());
        $this->assertEquals(OperatorDataCollection::class, get_class($result));
    }

    /** @test */
    public function with_role_included()
    {
        $data = TestCallApi::forCollection(config('socius-client.base_url') . config('socius-client.modules.operator') . '?include=role');
        $this->checkResults($data);
    }

    /** @test */
    public function with_customers_included()
    {
        $data = TestCallApi::forCollection(config('socius-client.base_url') . config('socius-client.modules.operator') . '?include=customers');
        $this->checkResults($data);
    }

    /** @test */
    public function with_branches_included()
    {
        $data = TestCallApi::forCollection(config('socius-client.base_url') . config('socius-client.modules.operator') . '?include=branches');
        $this->checkResults($data);
    }
}
