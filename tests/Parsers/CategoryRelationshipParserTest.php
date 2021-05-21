<?php

namespace Grixu\SociusClient\Tests\Parsers;

use Grixu\SociusClient\Loaders\CategoryRelationsLoader;
use Grixu\SociusClient\Parsers\RelationshipParser;
use Grixu\SociusClient\Tests\Helpers\ParserTestCase;

class CategoryRelationshipParserTest extends ParserTestCase
{
    protected string $loaderClass = CategoryRelationsLoader::class;
    protected string $parserClass = RelationshipParser::class;
}
