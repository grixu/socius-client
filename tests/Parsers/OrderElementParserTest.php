<?php

namespace Grixu\SociusClient\Tests\Parsers;

use Grixu\SociusClient\Loaders\OrderElementLoader;
use Grixu\SociusClient\Parsers\OrderElementParser;
use Grixu\SociusClient\Tests\Helpers\ParserTestCase;

class OrderElementParserTest extends ParserTestCase
{
    protected string $loaderClass = OrderElementLoader::class;
    protected string $parserClass = OrderElementParser::class;
}
