<?php

namespace Grixu\SociusClient\Product\DataTransferObjects;

class ProductTypeData  extends \Grixu\SociusModels\Product\DataTransferObjects\ProductTypeData
{
    public int $id;
    public ?ProductDataCollection $products;
}
