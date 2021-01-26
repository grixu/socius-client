<?php

namespace Grixu\SociusClient\Warehouse\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObjectCollection;

class StockDataCollection extends DataTransferObjectCollection
{
    public static function create(array $data): StockDataCollection
    {
        return new static(StockData::arrayOf($data));
    }

    public function current(): StockData
    {
        return parent::current();
    }
}
