<?php

namespace Grixu\SociusClient\Tests\Parsers;

use Grixu\SociusClient\Loaders\OperatorRelationsLoader;
use Grixu\SociusClient\Parsers\RelationshipParser;
use Grixu\SociusClient\Tests\Helpers\ParserTestCase;

class OperatorRelationshipParserTest extends ParserTestCase
{
    protected string $loaderClass = OperatorRelationsLoader::class;
    protected string $parserClass = RelationshipParser::class;
}
