<?php

namespace Grixu\SociusClient\Tests\Query;

use Grixu\SociusClient\Query\Actions\GetTokenAction;
use Grixu\SociusClient\Query\Exceptions\TokenIssueException;
use Grixu\SociusClient\SociusClientServiceProvider;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Orchestra\Testbench\TestCase;

/**
 * Class GetTokenActionTest
 * @package Grixu\SociusClient\Tests\Query
 */
class GetTokenActionTest extends TestCase
{
    private GetTokenAction $action;

    protected function setUp(): void
    {
        parent::setUp();

        $this->action = new GetTokenAction();
    }

    protected function getPackageProviders($app)
    {
        return [SociusClientServiceProvider::class];
    }

    /**
     * A basic feature test example.
     *
     * @return void
     * @throws \Grixu\SociusClient\Query\Exceptions\TokenIssueException
     * @test
     */
    public function getting_token()
    {
        $result = $this->action->execute();

        $this->assertNotEmpty($result);
        $this->assertIsString($result);
    }

    /**
     * Look how action handle HTTP error
     *
     * @return void
     * @test
     */
    public function with_http_error()
    {
        Cache::shouldReceive('get')->once()->andReturnNull();
        Http::fake(
            [
                '*' => Http::response('Not Found.', 404)
            ]
        );

        try {
            $this->action->execute();
        } catch (TokenIssueException $e) {
            $this->assertTrue(true);
        }
    }
}
