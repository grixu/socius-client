<?php

namespace Grixu\SociusClient\Operator\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObjectCollection;

class OperatorDataCollection extends DataTransferObjectCollection
{
    public static function create(array $data): OperatorDataCollection
    {
        return new static(OperatorData::arrayOf($data));
    }

    public function current(): OperatorData
    {
        return parent::current();
    }
}
