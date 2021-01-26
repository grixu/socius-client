<?php

namespace Grixu\SociusClient\Operator\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObjectCollection;

class OperatorRoleDataCollection extends DataTransferObjectCollection
{
    public static function create(array $data): OperatorRoleDataCollection
    {
        return new static(OperatorRoleData::arrayOf($data));
    }

    public function current(): OperatorRoleData
    {
        return parent::current();
    }
}
