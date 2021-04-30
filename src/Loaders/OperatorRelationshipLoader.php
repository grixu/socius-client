<?php

namespace Grixu\SociusClient\Loaders;

use Grixu\SociusClient\Abstracts\ApiLoader;

class OperatorRelationshipLoader extends ApiLoader
{
    public function __construct()
    {
        parent::__construct('operator_relationship');
    }
}
