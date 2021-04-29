<?php

namespace Grixu\SociusClient\Loaders;

use Grixu\SociusClient\Abstracts\ApiLoader;

class BranchLoader extends ApiLoader
{
    public function __construct()
    {
        parent::__construct('branch');
    }
}
