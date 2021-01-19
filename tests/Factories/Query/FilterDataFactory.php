<?php

namespace Grixu\SociusClient\Tests\Factories\Query;

use Grixu\DataFactories\Factory;
use Grixu\SociusClient\Query\DataTransferObjects\FilterData;

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
