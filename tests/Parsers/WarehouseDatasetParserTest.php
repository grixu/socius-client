<?php

namespace Grixu\SociusClient\Tests\Parsers;

use Grixu\SociusClient\Loaders\WarehouseDatasetLoader;
use Grixu\SociusClient\Parsers\WarehouseParser;
use Grixu\SociusClient\Tests\Helpers\ParserTestCase;

class WarehouseDatasetParserTest extends ParserTestCase
{
    protected string $loaderClass = WarehouseDatasetLoader::class;
    protected string $parserClass = WarehouseParser::class;
}
