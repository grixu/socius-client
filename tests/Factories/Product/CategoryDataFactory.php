<?php

namespace Grixu\SociusClient\Tests\Factories\Product;

use Grixu\SociusClient\Product\DataTransferObjects\CategoryData;
use Grixu\SociusClient\Support\Tests\Factory;

/**
 * Class CategoryDataFactory
 * @package Grixu\SociusClient\Tests\Factories
 */
class CategoryDataFactory extends Factory
{
    public static function new(): CategoryDataFactory
    {
        return new self();
    }

    public function create(array $parameters = []): CategoryData
    {
        return new CategoryData(
            $parameters +
            [
                'name' => 'Testowa kat',
                'syncTs' => now(),
                'updatedAt' => now(),
                'xlId' => 1,
            ]
        );
    }
}
