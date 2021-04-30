<?php

namespace Grixu\SociusClient\Loaders;

use Grixu\SociusClient\Abstracts\ApiLoader;

class OrderLoader extends ApiLoader
{
    public function __construct()
    {
        parent::__construct('order');
    }
}
