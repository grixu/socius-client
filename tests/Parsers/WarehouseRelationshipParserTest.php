<?php

namespace Grixu\SociusClient\Tests\Parsers;

use Grixu\SociusClient\Loaders\WarehouseRelationshipLoader;
use Grixu\SociusClient\Parsers\RelationshipParser;
use Grixu\SociusClient\Tests\Helpers\ParserTestCase;

class WarehouseRelationshipParserTest extends ParserTestCase
{
    protected string $loaderClass = WarehouseRelationshipLoader::class;
    protected string $parserClass = RelationshipParser::class;
}
