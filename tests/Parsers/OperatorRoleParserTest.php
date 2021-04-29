<?php

namespace Grixu\SociusClient\Tests\Parsers;

use Grixu\SociusClient\Loaders\OperatorRoleLoader;
use Grixu\SociusClient\Parsers\OperatorRoleParser;
use Grixu\SociusClient\Tests\Helpers\ParserTestCase;

class OperatorRoleParserTest extends ParserTestCase
{
    protected string $loaderClass = OperatorRoleLoader::class;
    protected string $parserClass = OperatorRoleParser::class;
}
