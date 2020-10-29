<?php

namespace Grixu\SociusClient\Description\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObjectCollection;

/**
 * Class LanguageDataCollection
 * @package Grixu\SociusClient\Description\DataTransferObjects
 * @method LanguageData current
 */
class LanguageDataCollection extends DataTransferObjectCollection
{
    public static function create(array $data): LanguageDataCollection
    {
        return new static(LanguageData::arrayOf($data));
    }
}
