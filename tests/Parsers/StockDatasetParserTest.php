<?php

namespace Grixu\SociusClient\Tests\Parsers;

use Grixu\SociusClient\Loaders\StockDatasetLoader;
use Grixu\SociusClient\Parsers\StockParser;
use Grixu\SociusClient\Tests\Helpers\ParserTestCase;

class StockDatasetParserTest extends ParserTestCase
{
    protected string $loaderClass = StockDatasetLoader::class;
    protected string $parserClass = StockParser::class;
}
