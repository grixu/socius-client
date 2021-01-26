<?php

namespace Grixu\SociusClient\Product\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObjectCollection;

class CategoryDataCollection extends DataTransferObjectCollection
{
    public static function create(array $data): CategoryDataCollection
    {
        return new static(CategoryData::arrayOf($data));
    }

    public function current(): CategoryData
    {
        return parent::current();
    }
}
