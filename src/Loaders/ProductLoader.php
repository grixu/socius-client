<?php

namespace Grixu\SociusClient\Loaders;

use Grixu\SociusClient\Abstracts\ApiLoader;

class ProductLoader extends ApiLoader
{
    public function __construct()
    {
        parent::__construct('product');
    }
}
