<?php

namespace Grixu\SociusClient\Description\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObjectCollection;

/**
 * Class ProductDescriptionDataCollection
 * @package Grixu\SociusClient\Description\DataTransferObjects
 * @method ProductDescriptionData current
 */
class ProductDescriptionDataCollection extends DataTransferObjectCollection
{
    public static function create(array $data): ProductDescriptionDataCollection
    {
        return new static(ProductDescriptionData::arrayOf($data));
    }
}
