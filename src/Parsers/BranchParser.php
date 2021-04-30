<?php

namespace Grixu\SociusClient\Parsers;

use Grixu\SociusClient\Abstracts\ApiParser;
use Grixu\SociusModels\Operator\DataTransferObjects\BranchData;

class BranchParser extends ApiParser
{
    public function __construct()
    {
        parent::__construct(BranchData::class);
    }
}
