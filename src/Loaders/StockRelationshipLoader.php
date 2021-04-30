<?php

namespace Grixu\SociusClient\Loaders;

use Grixu\SociusClient\Abstracts\ApiLoader;

class StockRelationshipLoader extends ApiLoader
{
    public function __construct()
    {
        parent::__construct('stock_relationship');
    }
}
