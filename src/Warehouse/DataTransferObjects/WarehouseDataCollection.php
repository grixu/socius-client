<?php

namespace Grixu\SociusClient\Warehouse\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObjectCollection;

class WarehouseDataCollection extends DataTransferObjectCollection
{
    public static function create(array $data): WarehouseDataCollection
    {
        return new static(WarehouseData::arrayOf($data));
    }

    public function current(): WarehouseData
    {
        return parent::current();
    }
}
