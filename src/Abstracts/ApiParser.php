<?php

namespace Grixu\SociusClient\Abstracts;

use Grixu\ApiClient\Data\StraightKeyParser;
use Grixu\Synchronizer\Process\Abstracts\AbstractParser;
use Grixu\Synchronizer\Process\Contracts\ParserInterface;
use Spatie\DataTransferObject\DataTransferObject;

abstract class ApiParser extends AbstractParser implements ParserInterface
{
    private StraightKeyParser $parser;

    public function __construct(string $dtoClass)
    {
        $this->parser = new StraightKeyParser($dtoClass);
    }

    public function parseElement($model): DataTransferObject
    {
        return $this->parser->parseElement($model);
    }
}
