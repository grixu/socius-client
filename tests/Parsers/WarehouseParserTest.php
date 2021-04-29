<?php

namespace Grixu\SociusClient\Tests\Parsers;

use Grixu\SociusClient\Loaders\WarehouseLoader;
use Grixu\SociusClient\Parsers\WarehouseParser;
use Grixu\SociusClient\Tests\Helpers\ParserTestCase;

class WarehouseParserTest extends ParserTestCase
{
    protected string $loaderClass = WarehouseLoader::class;
    protected string $parserClass = WarehouseParser::class;
}
