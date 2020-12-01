<?php

namespace Grixu\SociusClient\Tests\Factories\Operator;

use Grixu\SociusClient\Operator\DataTransferObjects\OperatorRoleData;
use Grixu\SociusClient\Support\Tests\Factory;

/**
 * Class OperatorRoleDataFactory
 * @package Grixu\SociusClient\Tests\Factories
 */
class OperatorRoleDataFactory extends Factory
{
    public static function new(): OperatorRoleDataFactory
    {
        return new self();
    }

    public function create(array $parameters = []): OperatorRoleData
    {
        return new OperatorRoleData(
            $parameters +
            [
                'name' => 'Testowy klient',
                'updatedAt' => now(),
                'xlId' => 1,
            ]
        );
    }
}
