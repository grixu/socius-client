<?php

namespace Grixu\SociusClient\Tests\Helpers;

use Grixu\ApiClient\ApiClientServiceProvider;
use Grixu\SociusClient\SociusClientServiceProvider;
use Grixu\SociusModels\SociusModelsServiceProvider;
use Grixu\Synchronizer\SynchronizerServiceProvider;
use Orchestra\Testbench\TestCase as OrchestraTestCase;

class TestCase extends OrchestraTestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            ApiClientServiceProvider::class,
            SynchronizerServiceProvider::class,
            SociusClientServiceProvider::class,
            SociusModelsServiceProvider::class,
        ];
    }
}
