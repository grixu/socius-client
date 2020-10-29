<?php

namespace Grixu\SociusClient\Tests\Factories\Warehouse;

use Grixu\SociusClient\Warehouse\DataTransferObjects\WarehouseData;
use Grixu\SociusClient\Warehouse\Enums\WarehouseLockEnum;
use Grixu\SociusClient\Support\Tests\Factory;

/**
 * Class WarehouseDataFactory
 * @package Grixu\SociusClient\Tests\Factories
 */
class WarehouseDataFactory extends Factory
{
    /**
     * @return WarehouseDataFactory
     */
    public static function new(): WarehouseDataFactory
    {
        return new self();
    }

    /**
     * @param array $parameters
     * @return WarehouseData
     */
    public function create(array $parameters = []): WarehouseData
    {
        return new WarehouseData(
            $parameters +
            [
                'name' => 'Testowy magazyn',
                'desc' => 'Testowy opis',
                'internal' => (bool) rand(0,1),
                'country' => 'PL',
                'stockCounting' => (bool) rand(0,1),
                'stockCountingDate' => now()->subDay(),
                'locked' => WarehouseLockEnum::UNLOCKED(),
                'xlOperatorId' => rand(1,4),
                'xlCustomerId' => 1,
                'syncTs' => now(),
                'updatedAt' => now(),
                'xlId' => 1,
            ]
        );
    }
}
