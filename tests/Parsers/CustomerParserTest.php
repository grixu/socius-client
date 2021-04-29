<?php

namespace Grixu\SociusClient\Tests\Parsers;

use Grixu\SociusClient\Loaders\CustomerLoader;
use Grixu\SociusClient\Parsers\CustomerParser;
use Grixu\SociusClient\Tests\Helpers\ParserTestCase;

class CustomerParserTest extends ParserTestCase
{
    protected string $loaderClass = CustomerLoader::class;
    protected string $parserClass = CustomerParser::class;
}
