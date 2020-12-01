<?php

namespace Grixu\SociusClient\Tests\Factories\Query;

use Grixu\SociusClient\Query\DataTransferObjects\FilterData;
use Grixu\SociusClient\Support\Tests\Factory;

/**
 * Class FilterDataFactory
 * @package Grixu\SociusClient\Tests\Factories
 */
class FilterDataFactory extends Factory
{
    public static function new(): FilterDataFactory
    {
        return new self();
    }

    public function create(array $parameters = []): FilterData
    {
        return new FilterData(
            $parameters +
            [
                'field' => 'name',
                'values' => [
                    'SZKLO',
                ]
            ]
        );
    }
}
