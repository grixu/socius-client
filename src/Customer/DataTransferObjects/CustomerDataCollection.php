<?php

namespace Grixu\SociusClient\Customer\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObjectCollection;

class CustomerDataCollection extends DataTransferObjectCollection
{
    public static function create(array $data): CustomerDataCollection
    {
        return new static(CustomerData::arrayOf($data));
    }

    public function current(): CustomerData
    {
        return parent::current();
    }
}
