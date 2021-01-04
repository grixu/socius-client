<?php

namespace Grixu\SociusClient\Query\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class FilterData extends DataTransferObject
{
    public string $field;
    public array $values;
}
