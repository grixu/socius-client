<?php

namespace Grixu\SociusClient\Query\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObjectCollection;

class FilterDataCollection extends DataTransferObjectCollection
{
    public static function create(array $data): FilterDataCollection
    {
        return new static(FilterData::arrayOf($data));
    }

    public function current(): FilterData
    {
        return parent::current();
    }
}
