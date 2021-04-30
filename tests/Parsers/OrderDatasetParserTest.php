<?php

namespace Grixu\SociusClient\Tests\Parsers;

use Grixu\SociusClient\Loaders\OrderDatasetLoader;
use Grixu\SociusClient\Parsers\OrderParser;
use Grixu\SociusClient\Tests\Helpers\ParserTestCase;

class OrderDatasetParserTest extends ParserTestCase
{
    protected string $loaderClass = OrderDatasetLoader::class;
    protected string $parserClass = OrderParser::class;
}
