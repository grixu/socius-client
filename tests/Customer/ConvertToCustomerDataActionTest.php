<?php

namespace Grixu\SociusClient\Tests\Customer;

use Grixu\SociusClient\Customer\Actions\ConvertToCustomerDataAction;
use Grixu\SociusClient\Customer\DataTransferObjects\CustomerDataCollection;
use Grixu\SociusClient\SociusClientServiceProvider;
use Grixu\SociusClient\Support\Tests\TestCallApi;
use Orchestra\Testbench\TestCase;

/**
 * Class ConvertToCustomerDataActionTest
 * @package Grixu\SociusClient\Tests\Customer
 */
class ConvertToCustomerDataActionTest extends TestCase
{
    private ConvertToCustomerDataAction $action;

    protected function setUp(): void
    {
        parent::setUp();

        $this->action = new ConvertToCustomerDataAction();
    }

    protected function getPackageProviders($app)
    {
        return [SociusClientServiceProvider::class];
    }

    /** @test */
    public function normal_pass()
    {
        $data = TestCallApi::forCollection(config('socius-client.base_url') . config('socius-client.modules.customer'));
        $result = $this->action->execute($data);

        $this->assertGreaterThan(0, $result->count());
        $this->assertEquals(CustomerDataCollection::class, get_class($result));
    }

    /** @test */
    public function with_operator_included()
    {
        $data = TestCallApi::forCollection(config('socius-client.base_url') . config('socius-client.modules.customer') . '?include=operator');
        $result = $this->action->execute($data);

        $this->assertGreaterThan(0, $result->count());
        $this->assertEquals(CustomerDataCollection::class, get_class($result));
    }
}
