<?php

namespace Grixu\SociusClient\Tests\Parsers;

use Grixu\SociusClient\Loaders\CategoryRelationshipLoader;
use Grixu\SociusClient\Parsers\RelationshipParser;
use Grixu\SociusClient\Tests\Helpers\ParserTestCase;

class CategoryRelationshipParserTest extends ParserTestCase
{
    protected string $loaderClass = CategoryRelationshipLoader::class;
    protected string $parserClass = RelationshipParser::class;
}
