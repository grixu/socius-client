<?php

namespace Grixu\SociusClient\Parsers;

use Grixu\SociusClient\Abstracts\ApiParser;
use Grixu\SociusModels\Warehouse\DataTransferObjects\WarehouseData;

class WarehouseParser extends ApiParser
{
    public function __construct()
    {
        parent::__construct(WarehouseData::class);
    }
}
