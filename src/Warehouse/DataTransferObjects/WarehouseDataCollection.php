<?php

namespace Grixu\SociusClient\Warehouse\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObjectCollection;

/**
 * Class WarehouseDataCollection
 * @package Grixu\SociusClient\Warehouse\DataTransferObjects
 * @method WarehouseData current
 */
class WarehouseDataCollection extends DataTransferObjectCollection
{
    /**
     * @param array $data
     * @return WarehouseDataCollection
     */
    public static function create(array $data): WarehouseDataCollection
    {
        return new static(WarehouseData::arrayOf($data));
    }
}
