<?php

namespace Grixu\SociusClient\Loaders;

use Grixu\SociusClient\Abstracts\ApiLoader;

class OrderElementLoader extends ApiLoader
{
    public function __construct()
    {
        parent::__construct('order_element');
    }
}
