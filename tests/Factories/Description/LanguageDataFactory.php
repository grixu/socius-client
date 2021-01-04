<?php

namespace Grixu\SociusClient\Tests\Factories\Description;

use Grixu\SociusClient\Description\DataTransferObjects\LanguageData;
use Grixu\SociusClient\Support\Tests\Factory;

class LanguageDataFactory extends Factory
{
    public static function new(): LanguageDataFactory
    {
        return new self();
    }

    public function create(array $parameters = []): LanguageData
    {
        return new LanguageData(
            $parameters +
            [
                'name' => 'Testowy język',
                'updatedAt' => now(),
                'xlId' => 1,
            ]
        );
    }
}
