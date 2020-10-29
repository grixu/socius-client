<?php

namespace Grixu\SociusClient\Query\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObjectCollection;

/**
 * Class FilterDataCollection
 * @package Grixu\SociusClient\Query\DataTransferObjects
 * @method FilterData current
 */
class FilterDataCollection extends DataTransferObjectCollection
{
    /**
     * @param array $data
     * @return FilterDataCollection
     */
    public static function create(array $data): FilterDataCollection
    {
        return new static(FilterData::arrayOf($data));
    }
}
