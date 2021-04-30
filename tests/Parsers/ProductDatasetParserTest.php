<?php

namespace Grixu\SociusClient\Tests\Parsers;

use Grixu\SociusClient\Loaders\ProductDatasetLoader;
use Grixu\SociusClient\Parsers\ProductParser;
use Grixu\SociusClient\Tests\Helpers\ParserTestCase;

class ProductDatasetParserTest extends ParserTestCase
{
    protected string $loaderClass = ProductDatasetLoader::class;
    protected string $parserClass = ProductParser::class;
}
