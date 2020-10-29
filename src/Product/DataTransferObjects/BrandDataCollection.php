<?php

namespace Grixu\SociusClient\Product\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObjectCollection;

/**
 * Class BrandDataCollection
 * @package Grixu\SociusClient\Product\DataTransferObjects
 * @method BrandData current
 */
class BrandDataCollection extends DataTransferObjectCollection
{
    /**
     * @param array $data
     * @return BrandDataCollection
     */
    public static function create(array $data): BrandDataCollection
    {
        return new static(BrandData::arrayOf($data));
    }
}
