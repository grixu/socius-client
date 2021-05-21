<?php

namespace Grixu\SociusClient\Tests\Loaders;

use Grixu\SociusClient\Loaders\ProductDescriptionRelationsLoader;
use Grixu\SociusClient\Tests\Helpers\LoaderRelationshipTestCase;

class ProductDescriptionRelationsLoaderTest extends LoaderRelationshipTestCase
{
    protected string $loaderClass = ProductDescriptionRelationsLoader::class;
}
