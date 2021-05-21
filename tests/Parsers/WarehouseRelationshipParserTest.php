<?php

namespace Grixu\SociusClient\Tests\Parsers;

use Grixu\SociusClient\Loaders\WarehouseRelationsLoader;
use Grixu\SociusClient\Parsers\RelationshipParser;
use Grixu\SociusClient\Tests\Helpers\ParserTestCase;

class WarehouseRelationshipParserTest extends ParserTestCase
{
    protected string $loaderClass = WarehouseRelationsLoader::class;
    protected string $parserClass = RelationshipParser::class;
}
