<?php

namespace Grixu\SociusClient\Tests\Query;

use Grixu\SociusClient\Query\Actions\CallApiAction;
use Grixu\SociusClient\Query\Exceptions\AccessDeniedException;
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

    /** @test */
    public function normal_pass()
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

    /** @test */
    public function with_http_error()
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

    /** @test */
    public function with_token_revalidation()
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

    /** @test */
    public function with_access_denied()
    {
        Http::fake(
            [
                '*' => Http::response('Access Denied', 403)
            ]
        );

        try {
            $this->action->execute($this->url);
        } catch (ApiCallException $e) {
            $this->assertTrue(false);
        } catch (TokenIssueException $e) {
            $this->assertTrue(false);
        } catch (AccessDeniedException $e) {
            $this->assertTrue(true);
        }
    }
}
