<?php

namespace Grixu\SociusClient\Tests\Parsers;

use Grixu\SociusClient\Loaders\BrandLoader;
use Grixu\SociusClient\Parsers\BrandParser;
use Grixu\SociusClient\Tests\Helpers\ParserTestCase;

class BrandParserTest extends ParserTestCase
{
    protected string $loaderClass = BrandLoader::class;
    protected string $parserClass = BrandParser::class;
}
