<?php

namespace Grixu\SociusClient\Tests\Parsers;

use Grixu\SociusClient\Loaders\StockRelationshipLoader;
use Grixu\SociusClient\Parsers\RelationshipParser;
use Grixu\SociusClient\Tests\Helpers\ParserTestCase;

class StockRelationshipParserTest extends ParserTestCase
{
    protected string $loaderClass = StockRelationshipLoader::class;
    protected string $parserClass = RelationshipParser::class;
}
