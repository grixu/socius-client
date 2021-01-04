<?php

namespace Grixu\SociusClient\Operator\DataTransferObjects;

use Illuminate\Support\Carbon;
use Spatie\DataTransferObject\DataTransferObject;

class BranchData extends DataTransferObject
{
    public int $id;
    public string $name;
    public int $xlId;
    public Carbon $syncTs;
    public Carbon $updatedAt;
    public ?OperatorDataCollection $operators;
}
