<?php

namespace Grixu\SociusClient\Tests\Parsers;

use Grixu\SociusClient\Loaders\OperatorDatasetLoader;
use Grixu\SociusClient\Parsers\OperatorParser;
use Grixu\SociusClient\Tests\Helpers\ParserTestCase;

class OperatorDatasetParserTest extends ParserTestCase
{
    protected string $loaderClass = OperatorDatasetLoader::class;
    protected string $parserClass = OperatorParser::class;
}
