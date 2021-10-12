<?php

namespace Grixu\SociusClient\Tests\Parsers;

use Grixu\SociusClient\Loaders\ProductAttachmentLoader;
use Grixu\SociusClient\Parsers\ProductAttachmentParser;
use Grixu\SociusClient\Tests\Helpers\ParserTestCase;

class ProductAttachmentParserTest extends ParserTestCase
{
    protected string $loaderClass = ProductAttachmentLoader::class;
    protected string $parserClass = ProductAttachmentParser::class;
}
