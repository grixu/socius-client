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
    /**
     * @return CategoryDataFactory
     */
    public static function new(): CategoryDataFactory
    {
        return new self();
    }

    /**
     * @param array $parameters
     * @return CategoryData
     */
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
