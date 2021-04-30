<?php

namespace Grixu\SociusClient\Tests\Parsers;

use Grixu\SociusClient\Loaders\CategoryLoader;
use Grixu\SociusClient\Parsers\CategoryParser;
use Grixu\SociusClient\Tests\Helpers\ParserTestCase;

class CategoryParserTest extends ParserTestCase
{
    protected string $loaderClass = CategoryLoader::class;
    protected string $parserClass = CategoryParser::class;
}
