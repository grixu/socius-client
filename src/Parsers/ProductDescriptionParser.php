<?php

namespace Grixu\SociusClient\Parsers;

use Grixu\SociusClient\Abstracts\ApiParser;
use Grixu\SociusModels\Description\DataTransferObjects\ProductDescriptionData;

class ProductDescriptionParser extends ApiParser
{
    public function __construct()
    {
        parent::__construct(ProductDescriptionData::class);
    }
}
