<?php

namespace Grixu\SociusClient\Tests\Loaders;

use Grixu\SociusClient\Loaders\OrderElementRelationsLoader;
use Grixu\SociusClient\Tests\Helpers\LoaderRelationshipTestCase;

class OrderElementRelationsLoaderTest extends LoaderRelationshipTestCase
{
    protected string $loaderClass = OrderElementRelationsLoader::class;
}
