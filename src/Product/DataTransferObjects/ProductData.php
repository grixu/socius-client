<?php

namespace Grixu\SociusClient\Product\DataTransferObjects;

use Grixu\SociusClient\Description\DataTransferObjects\ProductDescriptionDataCollection;
use Grixu\SociusClient\Warehouse\DataTransferObjects\StockDataCollection;

class ProductData extends \Grixu\SociusModels\Product\DataTransferObjects\ProductData
{
    public int $id;
    public ?ProductTypeData $productType;
    public ?BrandData $brand;
    public ?StockDataCollection $stocks;
    public ?ProductDescriptionDataCollection $descriptions;
}
