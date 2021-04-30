<?php

namespace Grixu\SociusClient\Tests\Parsers;

use Grixu\SociusClient\Loaders\OrderRelationshipLoader;
use Grixu\SociusClient\Parsers\OrderParser;
use Grixu\SociusClient\Tests\Helpers\ParserTestCase;

class OrderRelationshipParserTest extends ParserTestCase
{
    protected string $loaderClass = OrderRelationshipLoader::class;
    protected string $parserClass = OrderParser::class;
}
