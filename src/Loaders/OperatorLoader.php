<?php

namespace Grixu\SociusClient\Loaders;

use Grixu\SociusClient\Abstracts\ApiLoader;

class OperatorLoader extends ApiLoader
{
    public function __construct()
    {
        parent::__construct('operator');
    }
}
