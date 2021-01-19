<?php

namespace Grixu\SociusClient\Tests\Description;

use Grixu\SociusClient\Description\Actions\ParseLanguageAction;
use Grixu\SociusClient\SociusClientServiceProvider;
use Grixu\SociusClient\Tests\Helpers\TestCallApi;
use Orchestra\Testbench\TestCase;

class ParseLanguageActionTest extends TestCase
{
    private ParseLanguageAction $action;

    protected function setUp(): void
    {
        parent::setUp();

        $this->action = new ParseLanguageAction();
    }

    protected function getPackageProviders($app)
    {
        return [SociusClientServiceProvider::class];
    }

    /** @test */
    public function normal_pass()
    {
        $data = TestCallApi::forSingle(config('socius-client.base_url') . config('socius-client.modules.language'));
        $result = $this->action->execute($data);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
    }
}
