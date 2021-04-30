<?php

namespace Grixu\SociusClient\Loaders;

use Grixu\SociusClient\Abstracts\ApiLoader;

class WarehouseDatasetLoader extends ApiLoader
{
    public function __construct()
    {
        parent::__construct('warehouse_dataset');
    }
}
