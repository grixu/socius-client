<?php

namespace Grixu\SociusClient\Loaders;

use Grixu\SociusClient\Abstracts\ApiLoader;

class LanguageLoader extends ApiLoader
{
    public function __construct()
    {
        parent::__construct('language');
    }
}
