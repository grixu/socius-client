<?php


namespace Grixu\SociusClient\Tests\Factories\Product;

use Grixu\SociusClient\Product\DataTransferObjects\BrandData;
use Grixu\SociusClient\Support\Tests\Factory;

class BrandDataFactory extends Factory
{
    public static function new(): BrandDataFactory
    {
        return new self();
    }

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
