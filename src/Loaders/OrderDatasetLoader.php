<?php

namespace Grixu\SociusClient\Loaders;

use Grixu\SociusClient\Abstracts\ApiLoader;

class OrderDatasetLoader extends ApiLoader
{
    public function __construct()
    {
        parent::__construct('order_dataset');
    }
}
