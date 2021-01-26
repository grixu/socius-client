<?php

namespace Grixu\SociusClient\Product\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObjectCollection;

class BrandDataCollection extends DataTransferObjectCollection
{
    public static function create(array $data): BrandDataCollection
    {
        return new static(BrandData::arrayOf($data));
    }

    public function current(): BrandData
    {
        return parent::current();
    }
}
