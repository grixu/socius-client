<?php

namespace Grixu\SociusClient\Operator\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObjectCollection;

/**
 * Class OperatorDataCollection
 * @package Grixu\SociusClient\Operator\DataTransferObjects
 * @method OperatorData current
 */
class OperatorDataCollection extends DataTransferObjectCollection
{
    public static function create(array $data): OperatorDataCollection
    {
        return new static(OperatorData::arrayOf($data));
    }
}
