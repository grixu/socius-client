<?php

namespace Grixu\SociusClient\Product\DataTransferObjects;

use Carbon\Carbon;
use Spatie\DataTransferObject\DataTransferObject;

class ProductTypeData  extends DataTransferObject
{
    public int $id;
    public string $name;
    public Carbon $updatedAt;
    public int $xlId;
    public ?ProductDataCollection $products;
}
