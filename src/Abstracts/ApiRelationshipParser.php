<?php

namespace Grixu\SociusClient\Abstracts;

use Grixu\ApiClient\Data\StraightKeyParser;
use Grixu\Synchronizer\Process\Contracts\ParserInterface;
use Illuminate\Support\Collection;

abstract class ApiRelationshipParser implements ParserInterface
{
    private StraightKeyParser $parser;

    public function __construct(string $dtoClass)
    {
        $this->parser = new StraightKeyParser($dtoClass);
    }

    public function parse(Collection $collection): Collection
    {
        return $this->parser->parse($collection->flatten(2));
    }
}
