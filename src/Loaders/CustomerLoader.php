<?php

namespace Grixu\SociusClient\Loaders;

use Grixu\SociusClient\Abstracts\ApiLoader;

class CustomerLoader extends ApiLoader
{
    public function __construct()
    {
        parent::__construct('customer');
    }
}
