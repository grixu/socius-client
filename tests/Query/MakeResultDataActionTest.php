<?php

namespace Grixu\SociusClient\Tests\Query;

use Grixu\ApiClient\ApiClient;
use Grixu\SociusClient\Query\Actions\MakeResultDataAction;
use Grixu\SociusClient\Query\DataTransferObjects\ResultData;
use Grixu\SociusClient\SociusClientServiceProvider;
use Orchestra\Testbench\TestCase;

class MakeResultDataActionTest extends TestCase
{
    private MakeResultDataAction $action;
    private array $httpResponse;

    protected function setUp(): void
    {
        parent::setUp();

        $this->action = new MakeResultDataAction();

        $helperAction = ApiClient::make('socius-client.api');
        $this->httpResponse = $helperAction->call(
            config('socius-client.modules.product')
        );
    }

    protected function getPackageProviders($app)
    {
        return [SociusClientServiceProvider::class];
    }

    /** @test */
    public function normal_pass()
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

    /** @test */
    public function with_empty_response_data()
    {
        $result = $this->action->execute([]);

        $this->assertNull($result);
    }

    /** @test */
    public function with_broken_response_data()
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
