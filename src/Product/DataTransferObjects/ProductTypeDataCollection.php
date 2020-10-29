<?php

namespace Grixu\SociusClient\Product\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObjectCollection;

/**
 * Class ProductTypeDataCollection
 * @package Grixu\SociusClient\Product\DataTransferObjects
 * @method ProductTypeData current
 */
class ProductTypeDataCollection extends DataTransferObjectCollection
{
    /**
     * @param array $data
     * @return ProductTypeDataCollection
     */
    public static function create(array $data): ProductTypeDataCollection
    {
        return new static(ProductTypeData::arrayOf($data));
    }
}
