<?php

namespace Grixu\SociusClient\Loaders;

use Grixu\SociusClient\Abstracts\ApiLoader;

class CategoryDatasetLoader extends ApiLoader
{
    public function __construct()
    {
        parent::__construct('category_dataset');
    }
}
