<?php

namespace Grixu\SociusClient\Tests\Query;

use Grixu\SociusClient\Query\Actions\ResetTokenAction;
use Grixu\SociusClient\SociusClientServiceProvider;
use Orchestra\Testbench\TestCase;

/**
 * Class ResetTokenActionTest
 * @package Grixu\SociusClient\Tests\Query
 */
class ResetTokenActionTest extends TestCase
{
    private ResetTokenAction $action;

    protected function setUp(): void
    {
        parent::setUp();

        $this->action = new ResetTokenAction();
    }

    protected function getPackageProviders($app)
    {
        return [SociusClientServiceProvider::class];
    }

    /**
     * A basic feature test example.
     *
     * @return void
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
        $result = $this->action->execute();
        $this->assertIsString($result);
        $this->assertNotEmpty($result);
    }
}
