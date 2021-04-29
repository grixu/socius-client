<?php

namespace Grixu\SociusClient\Tests\Parsers;

use Grixu\SociusClient\Loaders\OperatorLoader;
use Grixu\SociusClient\Parsers\OperatorParser;
use Grixu\SociusClient\Tests\Helpers\ParserTestCase;

class OperatorParserTest extends ParserTestCase
{
    protected string $loaderClass = OperatorLoader::class;
    protected string $parserClass = OperatorParser::class;
}
