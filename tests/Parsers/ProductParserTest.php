<?php

namespace Grixu\SociusClient\Tests\Parsers;

use Grixu\SociusClient\Loaders\ProductLoader;
use Grixu\SociusClient\Parsers\ProductParser;
use Grixu\SociusClient\Tests\Helpers\ParserTestCase;

class ProductParserTest extends ParserTestCase
{
    protected string $loaderClass = ProductLoader::class;
    protected string $parserClass = ProductParser::class;
}
