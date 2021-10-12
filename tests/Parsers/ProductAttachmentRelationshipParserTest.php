<?php

namespace Grixu\SociusClient\Tests\Parsers;

use Grixu\SociusClient\Loaders\ProductAttachmentRelationsLoader;
use Grixu\SociusClient\Parsers\RelationshipParser;
use Grixu\SociusClient\Tests\Helpers\ParserTestCase;

class ProductAttachmentRelationshipParserTest extends ParserTestCase
{
    protected string $loaderClass = ProductAttachmentRelationsLoader::class;
    protected string $parserClass = RelationshipParser::class;
}
