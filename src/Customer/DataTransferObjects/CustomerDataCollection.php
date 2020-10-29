<?php

namespace Grixu\SociusClient\Customer\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObjectCollection;

/**
 * Class CustomerDataCollection
 * @package Grixu\SociusClient\Product\DataTransferObjects
 * @method CustomerData current
 */
class CustomerDataCollection extends DataTransferObjectCollection
{
    public static function create(array $data): CustomerDataCollection
    {
        return new static(CustomerData::arrayOf($data));
    }
}
