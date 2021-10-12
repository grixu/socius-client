<?php

namespace Grixu\SociusClient\Tests\Loaders;

use Grixu\SociusClient\Loaders\ProductAttachmentRelationsLoader;
use Grixu\SociusClient\Tests\Helpers\LoaderRelationshipTestCase;

class ProductAttachmentRelationsLoaderTest extends LoaderRelationshipTestCase
{
    protected string $loaderClass = ProductAttachmentRelationsLoader::class;
}
