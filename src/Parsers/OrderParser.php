<?php

namespace Grixu\SociusClient\Parsers;

use Grixu\SociusClient\Abstracts\ApiParser;
use Grixu\SociusModels\Order\DataTransferObjects\OrderData;

class OrderParser extends ApiParser
{
    public function __construct()
    {
        parent::__construct(OrderData::class);
    }
}
