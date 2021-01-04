<?php

namespace Grixu\SociusClient\Tests\Factories\Customer;

use Grixu\SociusClient\Customer\DataTransferObjects\CustomerData;
use Grixu\SociusClient\Support\Tests\Factory;

class CustomerDataFactory extends Factory
{
    public static function new(): CustomerDataFactory
    {
        return new self();
    }

    public function create(array $parameters = []): CustomerData
    {
        return new CustomerData(
            $parameters +
            [
                'name' => 'Testowy klient',
                'country' => 'PL',
                'postalCode' => '87-100',
                'city' => 'Toruń',
                'vatNumber' => '9562338798',
                'street' => 'Polna 140B',
                'voivodeship' => 'Kujawsko-pomorskie',
                'district' => 'Toruń',
                'paymentPeriod' => 15,
                'syncTs' => now(),
                'updatedAt' => now(),
                'xlId' => 1,
                'xlOperatorId' => 1,
            ]
        );
    }
}
