<?php

namespace Grixu\SociusClient\Warehouse\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObjectCollection;

/**
 * Class StockDataCollection
 * @package Grixu\SociusClient\Warehouse\DataTransferObjects
 * @method StockData current
 */
class StockDataCollection extends DataTransferObjectCollection
{
    /**
     * @param array $data
     * @return StockDataCollection
     */
    public static function create(array $data): StockDataCollection
    {
        return new static(StockData::arrayOf($data));
    }
}
