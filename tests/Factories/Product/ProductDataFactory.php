<?php

namespace Grixu\SociusClient\Tests\Factories\Product;

use Grixu\SociusClient\Product\DataTransferObjects\ProductData;
use Grixu\SociusClient\Product\Enums\ProductMeasureUnitEnum;
use Grixu\SociusClient\Product\Enums\ProductVatTypeEnum;
use Grixu\SociusClient\Support\Tests\Factory;

/**
 * Class ProductDataFactory
 * @package Grixu\SociusClient\Tests\Factories
 */
class ProductDataFactory extends Factory
{
    /**
     * @return ProductDataFactory
     */
    public static function new(): ProductDataFactory
    {
        return new self();
    }

    /**
     * @param array $parameters
     * @return ProductData
     */
    public function create(array $parameters = []): ProductData
    {
        return new ProductData(
            $parameters +
            [
                'name' => 'Test',
                'index' => '00000',
                'ean' => '000000',
                'measureUnit' => ProductMeasureUnitEnum::PIECE(),
                'taxGroup' => ProductVatTypeEnum::VAT23(),
                'taxValue' => 23,
                'weight' => 1.00,
                'xlId' => 1,
                'xlOperatorId' => 1,
                'brandId' => rand(11111,55555),
                'xlProductTypeId' => rand(11111,55555),
                'syncTs' => now(),
                'updatedAt' => now(),
                'price' => 100.50,
                'eshopPrice' => 101.50,
                'priceUpdated' => now(),
            ]
        );
    }
}
