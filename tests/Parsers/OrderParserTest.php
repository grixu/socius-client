<?php

namespace Grixu\SociusClient\Tests\Parsers;

use Grixu\SociusClient\Loaders\OrderLoader;
use Grixu\SociusClient\Parsers\OrderParser;
use Grixu\SociusClient\Tests\Helpers\ParserTestCase;

class OrderParserTest extends ParserTestCase
{
    protected string $loaderClass = OrderLoader::class;
    protected string $parserClass = OrderParser::class;
}
