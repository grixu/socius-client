<?php

namespace Grixu\SociusClient\Product\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObjectCollection;

/**
 * Class CategoryDataCollection
 * @package Grixu\SociusClient\Product\DataTransferObjects
 * @method CategoryData current
 */
class CategoryDataCollection extends DataTransferObjectCollection
{
    public static function create(array $data): CategoryDataCollection
    {
        return new static(CategoryData::arrayOf($data));
    }
}
