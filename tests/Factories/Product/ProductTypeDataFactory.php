<?php

namespace Grixu\SociusClient\Tests\Factories\Product;

use Grixu\SociusClient\Product\DataTransferObjects\ProductTypeData;
use Grixu\SociusClient\Support\Tests\Factory;

class ProductTypeDataFactory extends Factory
{
    public static function new(): ProductTypeDataFactory
    {
        return new self();
    }

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
