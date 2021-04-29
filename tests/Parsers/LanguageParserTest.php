<?php

namespace Grixu\SociusClient\Tests\Parsers;

use Grixu\SociusClient\Loaders\LanguageLoader;
use Grixu\SociusClient\Parsers\LanguageParser;
use Grixu\SociusClient\Tests\Helpers\ParserTestCase;

class LanguageParserTest extends ParserTestCase
{
    protected string $loaderClass = LanguageLoader::class;
    protected string $parserClass = LanguageParser::class;
}
