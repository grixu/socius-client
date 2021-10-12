<?php

namespace Grixu\SociusClient\Tests\Parsers;

use Grixu\SociusClient\Loaders\ProductAttachmentDatasetLoader;
use Grixu\SociusClient\Parsers\ProductAttachmentParser;
use Grixu\SociusClient\Tests\Helpers\ParserTestCase;

class ProductAttachmentDatasetParserTest extends ParserTestCase
{
    protected string $loaderClass = ProductAttachmentDatasetLoader::class;
    protected string $parserClass = ProductAttachmentParser::class;
}
