<?php

namespace Grixu\SociusClient\Description\DataTransferObjects;

use Illuminate\Support\Carbon;
use Spatie\DataTransferObject\DataTransferObject;

class LanguageData extends DataTransferObject
{
    public int $id;
    public string $name;
    public int $xlId;
    public Carbon $updatedAt;
}
