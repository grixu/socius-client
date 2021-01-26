<?php

namespace Grixu\SociusClient\Description\DataTransferObjects;

use Grixu\SociusClient\Product\DataTransferObjects\ProductData;

class ProductDescriptionData extends \Grixu\SociusModels\Description\DataTransferObjects\ProductDescriptionData
{
    public int $id;
    public ?ProductData $product;
    public ?LanguageData $language;
}
