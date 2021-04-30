<?php

namespace Grixu\SociusClient\Tests\Parsers;

use Grixu\SociusClient\Loaders\ProductTypeLoader;
use Grixu\SociusClient\Parsers\ProductTypeParser;
use Grixu\SociusClient\Tests\Helpers\ParserTestCase;

class ProductTypeParserTest extends ParserTestCase
{
    protected string $loaderClass = ProductTypeLoader::class;
    protected string $parserClass = ProductTypeParser::class;
}
