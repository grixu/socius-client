<?php

namespace Grixu\SociusClient\Loaders;

use Grixu\SociusClient\Abstracts\ApiLoader;

class StockRelationsLoader extends ApiLoader
{
    public function __construct()
    {
        parent::__construct('stock_relations');
    }
}
