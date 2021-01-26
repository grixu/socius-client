<?php

namespace Grixu\SociusClient\Description\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObjectCollection;

class LanguageDataCollection extends DataTransferObjectCollection
{
    public static function create(array $data): LanguageDataCollection
    {
        return new static(LanguageData::arrayOf($data));
    }

    public function current(): LanguageData
    {
        return parent::current();
    }
}
