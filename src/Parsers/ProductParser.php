<?php

namespace Grixu\SociusClient\Parsers;

use Grixu\SociusClient\Abstracts\ApiParser;
use Grixu\SociusModels\Product\DataTransferObjects\ProductData;

class ProductParser extends ApiParser
{
    public function __construct()
    {
        parent::__construct(ProductData::class);
    }
}
