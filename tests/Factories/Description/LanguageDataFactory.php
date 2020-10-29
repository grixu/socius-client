<?php

namespace Grixu\SociusClient\Tests\Factories\Description;

use Grixu\SociusClient\Description\DataTransferObjects\LanguageData;
use Grixu\SociusClient\Support\Tests\Factory;

/**
 * Class LanguageDataFactory
 * @package Grixu\SociusClient\Tests\Factories
 */
class LanguageDataFactory extends Factory
{
    /**
     * @return LanguageDataFactory
     */
    public static function new(): LanguageDataFactory
    {
        return new self();
    }

    /**
     * @param array $parameters
     * @return LanguageData
     */
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
