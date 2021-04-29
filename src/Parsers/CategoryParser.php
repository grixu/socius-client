<?php

namespace Grixu\SociusClient\Parsers;

use Grixu\SociusClient\Abstracts\ApiParser;
use Grixu\SociusModels\Product\DataTransferObjects\CategoryData;

class CategoryParser extends ApiParser
{
    public function __construct()
    {
        parent::__construct(CategoryData::class);
    }
}
