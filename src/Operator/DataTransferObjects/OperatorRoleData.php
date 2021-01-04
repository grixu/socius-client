<?php

namespace Grixu\SociusClient\Operator\DataTransferObjects;

use Illuminate\Support\Carbon;
use Spatie\DataTransferObject\DataTransferObject;

class OperatorRoleData extends DataTransferObject
{
    public int $id;
    public string $name;
    public int $xlId;
    public Carbon $updatedAt;
    public ?OperatorDataCollection $operators;
}
