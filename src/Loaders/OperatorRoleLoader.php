<?php

namespace Grixu\SociusClient\Loaders;

use Grixu\SociusClient\Abstracts\ApiLoader;

class OperatorRoleLoader extends ApiLoader
{
    public function __construct()
    {
        parent::__construct('operator_role');
    }
}
