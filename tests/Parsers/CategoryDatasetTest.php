<?php

namespace Grixu\SociusClient\Tests\Parsers;

use Grixu\SociusClient\Loaders\CategoryDatasetLoader;
use Grixu\SociusClient\Parsers\CategoryParser;
use Grixu\SociusClient\Tests\Helpers\ParserTestCase;

class CategoryDatasetTest extends ParserTestCase
{
    protected string $loaderClass = CategoryDatasetLoader::class;
    protected string $parserClass = CategoryParser::class;
}
