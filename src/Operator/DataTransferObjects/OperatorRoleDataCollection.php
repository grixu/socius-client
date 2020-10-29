<?php

namespace Grixu\SociusClient\Operator\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObjectCollection;

/**
 * Class OperatorRoleDataCollection
 * @package Grixu\SociusClient\Operator\DataTransferObjects
 * @method OperatorRoleData current
 */
class OperatorRoleDataCollection extends DataTransferObjectCollection
{
    public static function create(array $data): OperatorRoleDataCollection
    {
        return new static(OperatorRoleData::arrayOf($data));
    }
}
