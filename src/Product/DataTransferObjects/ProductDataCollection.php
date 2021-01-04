<?php

namespace Grixu\SociusClient\Product\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObjectCollection;

/**
 * Class ProductDataCollection
 * @package Grixu\SociusClient\Product\DataTransferObjects
 * @method ProductData current
 */
class ProductDataCollection extends DataTransferObjectCollection
{
    public static function create(array $data): ProductDataCollection
    {
        return new static(ProductData::arrayOf($data));
    }
}
