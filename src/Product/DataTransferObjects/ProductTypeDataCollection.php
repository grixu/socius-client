<?php

namespace Grixu\SociusClient\Product\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObjectCollection;

class ProductTypeDataCollection extends DataTransferObjectCollection
{
    public static function create(array $data): ProductTypeDataCollection
    {
        return new static(ProductTypeData::arrayOf($data));
    }

    public function current(): ProductTypeData
    {
        return parent::current();
    }
}
