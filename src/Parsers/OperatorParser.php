<?php

namespace Grixu\SociusClient\Parsers;

use Grixu\SociusClient\Abstracts\ApiParser;
use Grixu\SociusModels\Operator\DataTransferObjects\OperatorData;

class OperatorParser extends ApiParser
{
    public function __construct()
    {
        parent::__construct(OperatorData::class);
    }
}
