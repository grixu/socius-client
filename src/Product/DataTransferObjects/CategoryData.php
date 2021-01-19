<?php

namespace Grixu\SociusClient\Product\DataTransferObjects;

class CategoryData extends \Grixu\SociusModels\Product\DataTransferObjects\CategoryData
{
    public int $id;
    public ?CategoryData $parent;
    public ?CategoryDataCollection $children;
}
