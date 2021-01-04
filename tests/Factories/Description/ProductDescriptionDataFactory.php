<?php

namespace Grixu\SociusClient\Tests\Factories\Description;

use Grixu\SociusClient\Description\DataTransferObjects\ProductDescriptionData;
use Grixu\SociusClient\Support\Tests\Factory;

class ProductDescriptionDataFactory extends Factory
{
    public static function new(): ProductDescriptionDataFactory
    {
        return new self();
    }

    public function create(array $parameters = []): ProductDescriptionData
    {
        return new ProductDescriptionData(
            $parameters +
            [
                'name' => 'Testowa nazwa produktu',
                'desc' => 'Testowy opis długi',
                'pageTitle' => 'Testowa nazwa strony',
                'keywords' => 'Testowe słowa kluczowe',
                'shortDesc' => 'Testowy opis krótki',
                'metaDesc' => 'Testowy meta opis',
                'url' => 'Testowy url',
                'lastModification' => now()->subMinute(),
                'updatedAt' => now(),
                'syncTs' => now(),
                'xlId' => '1',
                'xlLanguageId' => 1,
                'xlProductId' => 1,
            ]
        );
    }
}
