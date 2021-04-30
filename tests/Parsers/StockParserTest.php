<?php

namespace Grixu\SociusClient\Tests\Parsers;

use Grixu\SociusClient\Loaders\StockLoader;
use Grixu\SociusClient\Parsers\StockParser;
use Grixu\SociusClient\Tests\Helpers\ParserTestCase;

class StockParserTest extends ParserTestCase
{
    protected string $loaderClass = StockLoader::class;
    protected string $parserClass = StockParser::class;
}
