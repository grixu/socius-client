<?php

namespace Grixu\SociusClient\Tests\Factories\Query;

use Grixu\SociusClient\Query\DataTransferObjects\FilterDataCollection;
use Grixu\SociusClient\Query\DataTransferObjects\RequestQueryData;
use Grixu\SociusClient\Support\Tests\Factory;

/**
 * Class RequestQueryDataFactory
 * @package Grixu\SociusClient\Tests\Factories
 */
class RequestQueryDataFactory extends Factory
{
    /**
     * @return RequestQueryDataFactory
     */
    public static function new(): RequestQueryDataFactory
    {
        return new self();
    }

    /**
     * @param array $parameters
     * @return RequestQueryData
     */
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
