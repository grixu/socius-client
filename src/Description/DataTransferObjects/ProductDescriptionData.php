<?php

namespace Grixu\SociusClient\Description\DataTransferObjects;

use Grixu\SociusClient\Product\DataTransferObjects\ProductData;
use Illuminate\Support\Carbon;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Class ProductDescriptionData
 * @package Grixu\SociusClient\Description\DataTransferObjects
 */
class ProductDescriptionData extends DataTransferObject
{
    public int $id;

    public string $name;

    public ?string $desc;

    public ?string $pageTitle;

    public ?string $keywords;

    public ?string $shortDesc;

    public ?string $metaDesc;

    public ?string $url;

    public ?Carbon $lastModification;

    public ?Carbon $lastModificationDesc;

    public int $xlId;

    public int $languageId;

    public int $productId;

    public Carbon $syncTs;

    public Carbon $updatedAt;

    public ?ProductData $product;

    public ?LanguageData $language;
}
