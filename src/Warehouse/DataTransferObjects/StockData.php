<?php

namespace Grixu\SociusClient\Warehouse\DataTransferObjects;

use Carbon\Carbon;
use Grixu\SociusClient\Product\DataTransferObjects\ProductData;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Class StockData
 * @package Grixu\SociusClient\Warehouse\DataTransferObjects
 */
class StockData extends DataTransferObject
{
    public int $id;

    public float $amount;

    public Carbon $receptionDate;

    public Carbon $syncTs;

    public Carbon $updatedAt;

    public int $warehouseId;

    public int $productId;

    public int $xlId;

    public ?WarehouseData $warehouse;

    public ?ProductData $product;
}
