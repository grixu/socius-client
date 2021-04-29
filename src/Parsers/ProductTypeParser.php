<?php

namespace Grixu\SociusClient\Parsers;

use Grixu\SociusClient\Abstracts\ApiParser;
use Grixu\SociusModels\Product\DataTransferObjects\ProductTypeData;

class ProductTypeParser extends ApiParser
{
    public function __construct()
    {
        parent::__construct(ProductTypeData::class);
    }
}
