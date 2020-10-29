<?php

namespace Grixu\SociusClient\Tests\Factories\Product;

use Grixu\SociusClient\Product\DataTransferObjects\ProductTypeData;
use Grixu\SociusClient\Support\Tests\Factory;

/**
 * Class ProductTypeDataFactory
 * @package Grixu\SociusClient\Tests\Factories
 */
class ProductTypeDataFactory extends Factory
{
    /**
     * @return ProductTypeDataFactory
     */
    public static function new(): ProductTypeDataFactory
    {
        return new self();
    }

    /**
     * @param array $parameters
     * @return ProductTypeData
     */
    public function create(array $parameters = []): ProductTypeData
    {
        return new ProductTypeData(
            $parameters +
            [
                'name' => 'Testowy typ',
                'updatedAt' => now()->subWeek(),
                'xlId' => 1,
            ]
        );
    }
}
