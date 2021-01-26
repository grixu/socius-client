<?php

namespace Grixu\SociusClient\Product\DataTransferObjects;

class BrandData extends \Grixu\SociusModels\Product\DataTransferObjects\BrandData
{
    public int $id;
    public ?ProductDataCollection $products;
}
