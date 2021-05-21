<?php

namespace Grixu\SociusClient\Tests\Parsers;

use Grixu\SociusClient\Loaders\OrderElementRelationsLoader;
use Grixu\SociusClient\Parsers\RelationshipParser;
use Grixu\SociusClient\Tests\Helpers\ParserTestCase;

class OrderElementRelationshipParserTest extends ParserTestCase
{
    protected string $loaderClass = OrderElementRelationsLoader::class;
    protected string $parserClass = RelationshipParser::class;
}
