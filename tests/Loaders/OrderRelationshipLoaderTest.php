<?php

namespace Grixu\SociusClient\Tests\Loaders;

use Grixu\SociusClient\Loaders\OrderRelationshipLoader;
use Grixu\SociusClient\Tests\Helpers\LoaderRelationshipTestCase;

class OrderRelationshipLoaderTest extends LoaderRelationshipTestCase
{
    protected string $loaderClass = OrderRelationshipLoader::class;
}
