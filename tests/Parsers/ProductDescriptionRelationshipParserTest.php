<?php

namespace Grixu\SociusClient\Tests\Parsers;

use Grixu\SociusClient\Loaders\ProductDescriptionRelationshipLoader;
use Grixu\SociusClient\Parsers\RelationshipParser;
use Grixu\SociusClient\Tests\Helpers\ParserTestCase;

class ProductDescriptionRelationshipParserTest extends ParserTestCase
{
    protected string $loaderClass = ProductDescriptionRelationshipLoader::class;
    protected string $parserClass = RelationshipParser::class;
}
