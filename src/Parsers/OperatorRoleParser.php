<?php

namespace Grixu\SociusClient\Parsers;

use Grixu\SociusClient\Abstracts\ApiParser;
use Grixu\SociusModels\Operator\DataTransferObjects\OperatorRoleData;

class OperatorRoleParser extends ApiParser
{
    public function __construct()
    {
        parent::__construct(OperatorRoleData::class);
    }
}
