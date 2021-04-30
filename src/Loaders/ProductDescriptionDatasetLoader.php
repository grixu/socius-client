<?php

namespace Grixu\SociusClient\Loaders;

use Grixu\SociusClient\Abstracts\ApiLoader;

class ProductDescriptionDatasetLoader extends ApiLoader
{
    public function __construct()
    {
        parent::__construct('description_dataset');
    }
}
