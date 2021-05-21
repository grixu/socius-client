<?php

namespace Grixu\SociusClient\Tests\Parsers;

use Grixu\SociusClient\Loaders\ProductRelationsLoader;
use Grixu\SociusClient\Parsers\RelationshipParser;
use Grixu\SociusClient\Tests\Helpers\ParserTestCase;

class ProductRelationshipParserTest extends ParserTestCase
{
    protected string $loaderClass = ProductRelationsLoader::class;
    protected string $parserClass = RelationshipParser::class;
}
