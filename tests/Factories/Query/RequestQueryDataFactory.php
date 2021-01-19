<?php

namespace Grixu\SociusClient\Tests\Factories\Query;

use Grixu\DataFactories\Factory;
use Grixu\SociusClient\Query\DataTransferObjects\FilterDataCollection;
use Grixu\SociusClient\Query\DataTransferObjects\RequestQueryData;

class RequestQueryDataFactory extends Factory
{
    public static function new(): RequestQueryDataFactory
    {
        return new self();
    }

    public function create(array $parameters = []): RequestQueryData
    {
        return new RequestQueryData(
            $parameters +
            [
                'filters' => FilterDataCollection::create(
                    [FilterDataFactory::new()->create()->toArray()]
                ),
                'includes' => [
                    'brand'
                ],
                'sorts' => [
                    'index'
                ]
            ]
        );
    }
}
