<?php

namespace Grixu\SociusClient\Operator\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObjectCollection;

/**
 * Class BranchDataCollection
 * @package Grixu\SociusClient\Operator\DataTransferObjects
 * @method BranchData current
 */
class BranchDataCollection extends DataTransferObjectCollection
{
    public static function create(array $data): BranchDataCollection
    {
        return new static(BranchData::arrayOf($data));
    }
}
