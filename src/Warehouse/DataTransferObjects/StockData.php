<?php

namespace Grixu\SociusClient\Warehouse\DataTransferObjects;

use Grixu\SociusClient\Product\DataTransferObjects\ProductData;

class StockData extends \Grixu\SociusModels\Warehouse\DataTransferObjects\StockData
{
    public int $id;
    public ?WarehouseData $warehouse;
    public ?ProductData $product;
}
