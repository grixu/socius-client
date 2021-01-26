<?php

namespace Grixu\SociusClient\Description\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObjectCollection;

class ProductDescriptionDataCollection extends DataTransferObjectCollection
{
    public static function create(array $data): ProductDescriptionDataCollection
    {
        return new static(ProductDescriptionData::arrayOf($data));
    }

    public function current(): ProductDescriptionData
    {
        return parent::current();
    }
}
