<?php

namespace Grixu\SociusClient\Tests\Query;

use Grixu\SociusClient\Query\Actions\CallApiAction;
use Grixu\SociusClient\Query\Actions\MakeResultDataAction;
use Grixu\SociusClient\Query\DataTransferObjects\ResultData;
use Grixu\SociusClient\SociusClientServiceProvider;
use Orchestra\Testbench\TestCase;

/**
 * Class MakeResultDataActionTest
 * @package Grixu\SociusClient\Tests\Query
 */
class MakeResultDataActionTest extends TestCase
{
    private MakeResultDataAction $action;
    private array $httpResponse;

    protected function setUp(): void
    {
        parent::setUp();

        $this->action = new MakeResultDataAction();

        $helperAction = new CallApiAction();
        $this->httpResponse = $helperAction->execute(
            config('socius-client.base_url') . config('socius-client.modules.product')
        );
    }

    protected function getPackageProviders($app)
    {
        return [SociusClientServiceProvider::class];
    }

    /**
     * Check basic scenario
     *
     * @return void
     * @test
     */
    public function action_basic()
    {
        $result = $this->action->execute($this->httpResponse);

        $this->assertEquals(ResultData::class, get_class($result));
        $this->assertNotEmpty($result->data);
        $this->assertNotEmpty($result->to);
        $this->assertNotEmpty($result->from);
        $this->assertNotEmpty($result->currentPage);
        $this->assertNotEmpty($result->lastPage);
        $this->assertNotEmpty($result->perPage);
        $this->assertNotEmpty($result->total);
    }

    /**
     * Test action when empty array will be pass as arg.
     *
     * @return void
     * @test
     */
    public function action_with_empty_response_data()
    {
        $result = $this->action->execute([]);

        $this->assertNull($result);
    }

    /**
     * Test action with broken response data
     *
     * @return void
     * @test
     */
    public function action_with_broken_response_data()
    {
        $result = $this->action->execute(
            [
                'data' => [
                    'total' => 0
                ]
            ]
        );

        $this->assertNull($result);
    }
}
