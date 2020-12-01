<?php

namespace Grixu\SociusClient\Tests\Factories\Operator;

use Grixu\SociusClient\Operator\DataTransferObjects\OperatorData;
use Grixu\SociusClient\Support\Tests\Factory;

/**
 * Class OperatorDataFactory
 * @package Grixu\SociusClient\Tests\Factories
 */
class OperatorDataFactory extends Factory
{
    public static function new(): OperatorDataFactory
    {
        return new self();
    }

    public function create(array $parameters = []): OperatorData
    {
        return new OperatorData(
            $parameters +
            [
                'name' => 'Testowy klient',
                'xlUsername' => 'USER',
                'email' => 'user@cdn.xl',
                'syncTs' => now(),
                'updatedAt' => now(),
                'xlId' => 1,
            ]
        );
    }
}
