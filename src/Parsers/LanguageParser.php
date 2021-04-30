<?php

namespace Grixu\SociusClient\Parsers;

use Grixu\SociusClient\Abstracts\ApiParser;
use Grixu\SociusModels\Description\DataTransferObjects\LanguageData;

class LanguageParser extends ApiParser
{
    public function __construct()
    {
        parent::__construct(LanguageData::class);
    }
}
