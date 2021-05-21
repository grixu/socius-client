<?php

namespace Grixu\SociusClient\Tests\Parsers;

use Grixu\SociusClient\Loaders\StockRelationsLoader;
use Grixu\SociusClient\Parsers\RelationshipParser;
use Grixu\SociusClient\Tests\Helpers\ParserTestCase;

class StockRelationshipParserTest extends ParserTestCase
{
    protected string $loaderClass = StockRelationsLoader::class;
    protected string $parserClass = RelationshipParser::class;
}
