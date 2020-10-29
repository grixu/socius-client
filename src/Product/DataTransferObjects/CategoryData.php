<?php

namespace Grixu\SociusClient\Product\DataTransferObjects;

use Illuminate\Support\Carbon;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Class CategoryData
 * @package Grixu\SociusClient\Product\DataTransferObjects
 */
class CategoryData extends DataTransferObject
{
    public int $id;

    public string $name;

    public Carbon $syncTs;

    public Carbon $updatedAt;

    public int $xlId;

    public ?int $parentId;

    public ?CategoryData $parent;

    public ?CategoryDataCollection $children;
}
