<?php

namespace Grixu\SociusClient\Parsers;

use Grixu\SociusClient\Abstracts\ApiParser;
use Grixu\SociusModels\Product\DataTransferObjects\ProductAttachmentData;

class ProductAttachmentParser extends ApiParser
{
    public function __construct()
    {
        parent::__construct(ProductAttachmentData::class);
    }
}
