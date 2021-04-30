<?php

namespace Grixu\SociusClient\Loaders;

use Grixu\SociusClient\Abstracts\ApiLoader;

class BrandLoader extends ApiLoader
{
    public function __construct()
    {
        parent::__construct('brand');
    }
}
