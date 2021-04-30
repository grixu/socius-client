<?php

namespace Grixu\SociusClient\Parsers;

use Grixu\SociusClient\Abstracts\ApiParser;
use Grixu\SociusModels\Order\DataTransferObjects\OrderElementData;

class OrderElementParser extends ApiParser
{
    public function __construct()
    {
        parent::__construct(OrderElementData::class);
    }
}
