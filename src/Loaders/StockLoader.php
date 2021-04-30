<?php

namespace Grixu\SociusClient\Loaders;

use Grixu\SociusClient\Abstracts\ApiLoader;

class StockLoader extends ApiLoader
{
    public function __construct()
    {
        parent::__construct('stock');
    }
}
