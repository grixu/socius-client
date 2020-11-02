<?php

namespace Grixu\SociusClient\Product\DataTransferObjects;

use Grixu\SociusClient\Description\DataTransferObjects\ProductDescriptionDataCollection;
use Grixu\SociusClient\Warehouse\DataTransferObjects\StockDataCollection;
use Illuminate\Support\Carbon;
use Grixu\SociusClient\Product\Enums\ProductMeasureUnitEnum;
use Grixu\SociusClient\Product\Enums\ProductVatTypeEnum;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Class ProductData
 * @package Grixu\SociusClient\Product\DataTransferObjects
 */
class ProductData extends DataTransferObject
{
    public int $id;

    public string $name;

    public string $index;

    public string $ean;

    public ProductMeasureUnitEnum $measureUnit;

    public ProductVatTypeEnum $taxGroup;

    public int $taxValue;

    public float $weight;

    public int $xlId;

    public ?int $operatorId;

    public ?int $brandId;

    public ?int $productTypeId;

    public Carbon $syncTs;

    public Carbon $updatedAt;

    public bool $eshop=false;

    public bool $availability=false;

    public bool $attachments=false;

    public bool $archived=true;

    public bool $blocked=true;

    public ?int $flags;

    public ?ProductTypeData $productType;

    public ?BrandData $brand;

    public ?StockDataCollection $stocks;

    public ?ProductDescriptionDataCollection $descriptions;

    public ?float $price;

    public ?float $eshopPrice;

    public ?Carbon $priceUpdated;
}
