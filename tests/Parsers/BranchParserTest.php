<?php

namespace Grixu\SociusClient\Tests\Parsers;

use Grixu\SociusClient\Loaders\BranchLoader;
use Grixu\SociusClient\Parsers\BranchParser;
use Grixu\SociusClient\Tests\Helpers\ParserTestCase;

class BranchParserTest extends ParserTestCase
{
    protected string $loaderClass = BranchLoader::class;
    protected string $parserClass = BranchParser::class;
}
