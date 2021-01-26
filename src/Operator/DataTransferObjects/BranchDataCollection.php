<?php

namespace Grixu\SociusClient\Operator\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObjectCollection;

class BranchDataCollection extends DataTransferObjectCollection
{
    public static function create(array $data): BranchDataCollection
    {
        return new static(BranchData::arrayOf($data));
    }

    public function current(): BranchData
    {
        return parent::current();
    }
}
