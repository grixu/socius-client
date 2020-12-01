<?php

namespace Grixu\SociusClient\Tests\Description;

use Grixu\SociusClient\Description\Actions\ConvertToLanguageDataAction;
use Grixu\SociusClient\Description\DataTransferObjects\LanguageDataCollection;
use Grixu\SociusClient\SociusClientServiceProvider;
use Grixu\SociusClient\Support\Tests\TestCallApi;
use Orchestra\Testbench\TestCase;

/**
 * Class ConvertToLanguageDataActionTest
 * @package Grixu\SociusClient\Tests\Description
 */
class ConvertToLanguageDataActionTest extends TestCase
{
    private ConvertToLanguageDataAction $action;

    protected function setUp(): void
    {
        parent::setUp();

        $this->action = new ConvertToLanguageDataAction();
    }

    protected function getPackageProviders($app)
    {
        return [SociusClientServiceProvider::class];
    }

    /** @test */
    public function normal_pass()
    {
        $data = TestCallApi::forCollection(config('socius-client.base_url') . config('socius-client.modules.language'));
        $result = $this->action->execute($data);

        $this->assertGreaterThan(0, $result->count());
        $this->assertEquals(LanguageDataCollection::class, get_class($result));
    }
}
