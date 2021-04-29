<?php

namespace Grixu\SociusClient\Parsers;

use Grixu\SociusClient\Abstracts\ApiParser;
use Grixu\SociusModels\Product\DataTransferObjects\BrandData;

class BrandParser extends ApiParser
{
    public function __construct()
    {
        parent::__construct(BrandData::class);
    }
}
