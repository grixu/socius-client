<?php

namespace Grixu\SociusClient\Tests\Loaders;

use Grixu\SociusClient\Loaders\OrderRelationsLoader;
use Grixu\SociusClient\Tests\Helpers\LoaderRelationshipTestCase;

class OrderRelationsLoaderTest extends LoaderRelationshipTestCase
{
    protected string $loaderClass = OrderRelationsLoader::class;
}
