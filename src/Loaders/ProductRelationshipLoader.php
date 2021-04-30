<?php

namespace Grixu\SociusClient\Loaders;

use Grixu\SociusClient\Abstracts\ApiLoader;

class ProductRelationshipLoader extends ApiLoader
{
    public function __construct()
    {
        parent::__construct('product_relationship');
    }
}
