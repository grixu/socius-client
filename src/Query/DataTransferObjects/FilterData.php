<?php

namespace Grixu\SociusClient\Query\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

/**
 * Class FilterData
 * @package Grixu\SociusClient\Query\DataTransferObjects
 */
class FilterData extends DataTransferObject
{
    public string $field;
    public array $values;
}
