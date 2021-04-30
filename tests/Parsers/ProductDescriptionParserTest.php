<?php

namespace Grixu\SociusClient\Tests\Parsers;

use Grixu\SociusClient\Loaders\ProductDescriptionLoader;
use Grixu\SociusClient\Parsers\ProductDescriptionParser;
use Grixu\SociusClient\Tests\Helpers\ParserTestCase;

class ProductDescriptionParserTest extends ParserTestCase
{
    protected string $loaderClass = ProductDescriptionLoader::class;
    protected string $parserClass = ProductDescriptionParser::class;
}
