<?php

namespace Grixu\SociusClient\Loaders;

use Grixu\SociusClient\Abstracts\ApiLoader;

class ProductRelationsLoader extends ApiLoader
{
    public function __construct()
    {
        parent::__construct('product_relations');
    }
}
