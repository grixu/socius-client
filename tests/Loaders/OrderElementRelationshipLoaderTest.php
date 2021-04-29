<?php

namespace Grixu\SociusClient\Tests\Loaders;

use Grixu\SociusClient\Loaders\OrderElementRelationshipLoader;
use Grixu\SociusClient\Tests\Helpers\LoaderRelationshipTestCase;

class OrderElementRelationshipLoaderTest extends LoaderRelationshipTestCase
{
    protected string $loaderClass = OrderElementRelationshipLoader::class;
}
