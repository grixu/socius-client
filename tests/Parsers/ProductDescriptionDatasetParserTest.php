<?php

namespace Grixu\SociusClient\Tests\Parsers;

use Grixu\SociusClient\Loaders\ProductDescriptionDatasetLoader;
use Grixu\SociusClient\Parsers\ProductDescriptionParser;
use Grixu\SociusClient\Tests\Helpers\ParserTestCase;

class ProductDescriptionDatasetParserTest extends ParserTestCase
{
    protected string $loaderClass = ProductDescriptionDatasetLoader::class;
    protected string $parserClass = ProductDescriptionParser::class;
}
