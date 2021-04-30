<?php

namespace Grixu\SociusClient\Loaders;

use Grixu\SociusClient\Abstracts\ApiLoader;

class CategoryLoader extends ApiLoader
{
    public function __construct()
    {
        parent::__construct('category');
    }
}
