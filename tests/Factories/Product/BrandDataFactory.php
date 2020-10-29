<?php


namespace Grixu\SociusClient\Tests\Factories\Product;

use Grixu\SociusClient\Product\DataTransferObjects\BrandData;
use Grixu\SociusClient\Support\Tests\Factory;

/**
 * Class BrandDataFactory
 * @package Grixu\SociusClient\Tests\Factories
 */
class BrandDataFactory extends Factory
{
    /**
     * @return BrandDataFactory
     */
    public static function new(): BrandDataFactory
    {
        return new self();
    }

    /**
     * @param array $parameters
     * @return BrandData
     */
    public function create(array $parameters = []): BrandData
    {
        return new BrandData(
            $parameters +
            [
                'name' => 'Testowa marka',
                'updatedAt' => now()->subWeek(),
                'xlId' => 1,
            ]
        );
    }
}
