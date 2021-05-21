<?php

namespace Grixu\SociusClient\Tests\Loaders;

use Grixu\SociusClient\Loaders\ProductRelationsLoader;
use Grixu\SociusClient\Tests\Helpers\LoaderRelationshipTestCase;

class ProductRelationsLoaderTest extends LoaderRelationshipTestCase
{
    protected string $loaderClass = ProductRelationsLoader::class;
}
