<?php

namespace Grixu\SociusClient\Tests\Parsers;

use Grixu\SociusClient\Loaders\OrderElementDatasetLoader;
use Grixu\SociusClient\Parsers\OrderElementParser;
use Grixu\SociusClient\Tests\Helpers\ParserTestCase;

class OrderElementDatasetParserTest extends ParserTestCase
{
    protected string $loaderClass = OrderElementDatasetLoader::class;
    protected string $parserClass = OrderElementParser::class;
}
