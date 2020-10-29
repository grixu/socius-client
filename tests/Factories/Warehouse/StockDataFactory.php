<?php

namespace Grixu\SociusClient\Tests\Factories\Warehouse;

use Grixu\SociusClient\Warehouse\DataTransferObjects\StockData;
use Grixu\SociusClient\Support\Tests\Factory;

/**
 * Class StockDataFactory
 * @package Grixu\SociusClient\Tests\Factories
 */
class StockDataFactory extends Factory
{
    /**
     * @return StockDataFactory
     */
    public static function new(): StockDataFactory
    {
        return new self();
    }

    /**
     * @param array $parameters
     * @return StockData
     */
    public function create(array $parameters = []): StockData
    {
        return new StockData(
            $parameters +
            [
                'amount' => (double) rand(1,1000),
                'receptionDate' => now()->subDay(),
                'xlProductId' => rand(1,4),
                'xlWarehouseId' => 1,
                'syncTs' => now(),
                'updatedAt' => now(),
                'xlId' => '1',
            ]
        );
    }
}
