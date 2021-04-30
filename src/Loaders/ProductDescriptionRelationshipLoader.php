<?php

namespace Grixu\SociusClient\Loaders;

use Grixu\SociusClient\Abstracts\ApiLoader;

class ProductDescriptionRelationshipLoader extends ApiLoader
{
    public function __construct()
    {
        parent::__construct('description_relationship');
    }
}
