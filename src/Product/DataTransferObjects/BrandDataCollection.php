<?php

namespace Grixu\SociusClient\Product\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObjectCollection;

/**
 * @method BrandData current
 */
class BrandDataCollection extends DataTransferObjectCollection
{
    public static function create(array $data): BrandDataCollection
    {
        return new static(BrandData::arrayOf($data));
    }
}
