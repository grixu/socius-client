<?php

namespace Grixu\SociusClient\Loaders;

use Grixu\SociusClient\Abstracts\ApiLoader;

class ProductDescriptionRelationsLoader extends ApiLoader
{
    public function __construct()
    {
        parent::__construct('description_relations');
    }
}
