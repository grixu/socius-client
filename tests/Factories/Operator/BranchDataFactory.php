<?php

namespace Grixu\SociusClient\Tests\Factories\Operator;

use Grixu\SociusClient\Operator\DataTransferObjects\BranchData;
use Grixu\SociusClient\Support\Tests\Factory;

/**
 * Class BranchDataFactory
 * @package Grixu\SociusClient\Tests\Factories
 */
class BranchDataFactory extends Factory
{
    /**
     * @return BranchDataFactory
     */
    public static function new(): BranchDataFactory
    {
        return new self();
    }

    /**
     * @param array $parameters
     * @return BranchData
     */
    public function create(array $parameters = []): BranchData
    {
        return new BranchData(
            $parameters +
            [
                'name' => 'Testowy klient',
                'syncTs' => now(),
                'updatedAt' => now(),
                'xlId' => 1,
            ]
        );
    }
}
