<?php

namespace Grixu\SociusClient\Tests\Parsers;

use Grixu\SociusClient\Loaders\OrderRelationsLoader;
use Grixu\SociusClient\Parsers\OrderParser;
use Grixu\SociusClient\Tests\Helpers\ParserTestCase;

class OrderRelationshipParserTest extends ParserTestCase
{
    protected string $loaderClass = OrderRelationsLoader::class;
    protected string $parserClass = OrderParser::class;
}
