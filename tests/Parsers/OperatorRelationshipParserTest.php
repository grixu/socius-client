<?php

namespace Grixu\SociusClient\Tests\Parsers;

use Grixu\SociusClient\Loaders\OperatorRelationshipLoader;
use Grixu\SociusClient\Parsers\RelationshipParser;
use Grixu\SociusClient\Tests\Helpers\ParserTestCase;

class OperatorRelationshipParserTest extends ParserTestCase
{
    protected string $loaderClass = OperatorRelationshipLoader::class;
    protected string $parserClass = RelationshipParser::class;
}
