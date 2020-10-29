<?php

namespace Grixu\SociusClient\Customer\DataTransferObjects;

use Grixu\SociusClient\Operator\DataTransferObjects\OperatorData;
use Illuminate\Support\Carbon;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Class CustomerData
 * @package Grixu\SociusClient\Customer\DataTransferObjects
 */
class CustomerData extends DataTransferObject
{
    public int $id;

    public string $name;

    public string $country;

    public string $postalCode;

    public string $city;

    public string $vatNumber;

    public string $street;

    public string $voivodeship;

    public string $district;

    public ?string $phone1;

    public ?string $phone2;

    public ?string $email;

    public int $paymentPeriod;

    public int $xlId;

    public Carbon $syncTs;

    public Carbon $updatedAt;

    public ?int $operatorId;

    public ?OperatorData $operator;
}
