<?php

namespace Grixu\SociusClient\Tests\Helpers;

use Grixu\Synchronizer\Contracts\LoaderInterface;
use Grixu\Synchronizer\Contracts\ParserInterface;
use Illuminate\Support\Collection;

class ParserTestCase extends TestCase
{
    protected $data;
    protected ParserInterface $parser;
    protected string $loaderClass;
    protected string $parserClass;

    protected function setUp(): void
    {
        parent::setUp();

        /** @var LoaderInterface $loader */
        $loader = app($this->loaderClass);

        $this->data = $loader->get()->first();

        /** @var ParserInterface parser */
        $this->parser = app($this->parserClass);
    }

    /** @test */
    public function it_parse_api_data_to_dto()
    {
        $returnedData = $this->parser->parse($this->data);

        $this->assertNotEmpty($returnedData);
        $this->assertTrue($returnedData instanceof Collection);
    }
}
