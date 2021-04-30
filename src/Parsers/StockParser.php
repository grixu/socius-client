<?php

namespace Grixu\SociusClient\Parsers;

use Grixu\SociusClient\Abstracts\ApiParser;
use Grixu\SociusModels\Warehouse\DataTransferObjects\StockData;

class StockParser extends ApiParser
{
    public function __construct()
    {
        parent::__construct(StockData::class);
    }
}
