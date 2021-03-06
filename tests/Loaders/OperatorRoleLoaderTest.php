<?php

namespace Grixu\SociusClient\Tests\Loaders;

use Grixu\SociusClient\Loaders\OperatorRelationsLoader;
use Grixu\SociusClient\Tests\Helpers\LoaderRelationshipTestCase;

class OperatorRoleLoaderTest extends LoaderRelationshipTestCase
{
    protected string $loaderClass = OperatorRelationsLoader::class;
}
