<?php

namespace Grixu\SociusClient\Tests\Factories\Operator;

use Grixu\SociusClient\Operator\DataTransferObjects\BranchData;
use Grixu\SociusClient\Support\Tests\Factory;

class BranchDataFactory extends Factory
{
    public static function new(): BranchDataFactory
    {
        return new self();
    }

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
