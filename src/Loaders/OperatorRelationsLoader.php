<?php

namespace Grixu\SociusClient\Loaders;

use Grixu\SociusClient\Abstracts\ApiLoader;

class OperatorRelationsLoader extends ApiLoader
{
    public function __construct()
    {
        parent::__construct('operator_relations');
    }
}
