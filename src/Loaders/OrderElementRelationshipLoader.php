<?php

namespace Grixu\SociusClient\Loaders;

use Grixu\SociusClient\Abstracts\ApiLoader;

class OrderElementRelationshipLoader extends ApiLoader
{
    public function __construct()
    {
        parent::__construct('order_element_relationship');
    }
}
