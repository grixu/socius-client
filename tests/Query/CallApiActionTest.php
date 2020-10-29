<?php

namespace Grixu\SociusClient\Tests\Query;

use Grixu\SociusClient\Query\Actions\CallApiAction;
use Grixu\SociusClient\Query\Exceptions\ApiCallException;
use Grixu\SociusClient\Query\Exceptions\TokenIssueException;
use Grixu\SociusClient\Query\Exceptions\WrongConfigException;
use Grixu\SociusClient\SociusClientServiceProvider;
use Illuminate\Support\Facades\Http;
use Orchestra\Testbench\TestCase;

/**
 * Class CallApiActionTest
 * @package Grixu\SociusClient\Tests\Query
 */
class CallApiActionTest extends TestCase
{
    private CallApiAction $action;
    private string $url;

    protected function setUp(): void
    {
        parent::setUp();

        $this->action = new CallApiAction();
        $this->url = config('socius-client.base_url') . config('socius-client.modules.product');
    }

    protected function getPackageProviders($app)
    {
        return [SociusClientServiceProvider::class];
    }

    protected function useClearConfig($app)
    {
        $app->config->set('socius-client.base_url', '');
    }

    /**
     * Test how action make api call
     *
     * @return void
     * @throws \Grixu\SociusClient\Query\Exceptions\ApiCallException
     * @throws \Grixu\SociusClient\Query\Exceptions\TokenIssueException
     * @test
     */
    public function api_call()
    {
        $result = $this->action->execute($this->url);

        $this->assertIsArray($result);
        $this->assertArrayHasKey('data', $result);
        $this->assertArrayHasKey('current_page', $result['data']);
        $this->assertArrayHasKey('total', $result['data']);
        $this->assertArrayHasKey('from', $result['data']);
        $this->assertArrayHasKey('to', $result['data']);
        $this->assertArrayHasKey('per_page', $result['data']);
        $this->assertArrayHasKey('last_page', $result['data']);
        $this->assertArrayHasKey('data', $result['data']);
    }

    /**
     * Check how action handle HTTP error
     *
     * @return void
     * @test
     * @throws \Grixu\SociusClient\Query\Exceptions\WrongConfigException
     */
    public function api_call_with_http_error()
    {
        Http::fake(
            [
                '*' => Http::response('Not Found.', 404)
            ]
        );

        try {
            $this->action->execute($this->url);
        } catch (ApiCallException $e) {
            $this->assertTrue(true);
        } catch (TokenIssueException $e) {
            $this->assertTrue(false);
        }
    }

    /**
     * Check how action handle revalidating token
     *
     * @return void
     * @test
     * @throws \Grixu\SociusClient\Query\Exceptions\WrongConfigException
     */
    public function with_http_error()
    {
        Http::fake(
            [
                '*' => Http::sequence()
                    ->push('Unauthenticated.', 401)
                    ->push(
                        [
                            'access_token' => 'blebleble'
                        ],
                        200
                    )
                    ->push(
                        [
                            'data' => 'Yeees'
                        ],
                        200
                    )

            ]
        );

        try {
            $result = $this->action->execute($this->url);

            $this->assertIsArray($result);
            $this->assertArrayHasKey('data', $result);
        } catch (TokenIssueException $e) {
            $this->assertTrue(false);
        } catch (ApiCallException $e) {
            $this->assertTrue(false);
        }
    }

    /**
     * Test reaction when lacks one of config params
     *
     * @return void
     * @test
     * @environment-setup useClearConfig
     */
    public function with_no_config()
    {
        try {
            $this->action->execute($this->url);
            $this->assertTrue(false);
        } catch (ApiCallException $e) {
            $this->assertTrue(false);
        } catch (TokenIssueException $e) {
            $this->assertTrue(false);
        } catch (WrongConfigException $e) {
            $this->assertTrue(true);
        }
    }
}
