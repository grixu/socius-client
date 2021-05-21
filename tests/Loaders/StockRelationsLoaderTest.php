<?php

namespace Grixu\SociusClient\Tests\Loaders;

use Grixu\SociusClient\Loaders\StockRelationsLoader;
use Grixu\SociusClient\Tests\Helpers\LoaderRelationshipTestCase;

class StockRelationsLoaderTest extends LoaderRelationshipTestCase
{
    protected string $loaderClass = StockRelationsLoader::class;
}
