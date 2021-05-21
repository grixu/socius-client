<?php

namespace Grixu\SociusClient\Tests\Parsers;

use Grixu\SociusClient\Loaders\ProductDescriptionRelationsLoader;
use Grixu\SociusClient\Parsers\RelationshipParser;
use Grixu\SociusClient\Tests\Helpers\ParserTestCase;

class ProductDescriptionRelationshipParserTest extends ParserTestCase
{
    protected string $loaderClass = ProductDescriptionRelationsLoader::class;
    protected string $parserClass = RelationshipParser::class;
}
