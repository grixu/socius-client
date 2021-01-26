<?php

namespace Grixu\SociusClient\Product\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObjectCollection;

class ProductDataCollection extends DataTransferObjectCollection
{
    public static function create(array $data): ProductDataCollection
    {
        return new static(ProductData::arrayOf($data));
    }

    public function current(): ProductData
    {
        return parent::current();
    }
}
