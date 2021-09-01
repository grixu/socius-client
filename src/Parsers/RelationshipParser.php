<?php

namespace Grixu\SociusClient\Parsers;

use Grixu\SociusDto\RelationsData;
use Grixu\SociusClient\Abstracts\ApiRelationshipParser;

class RelationshipParser extends ApiRelationshipParser
{
    public function __construct()
    {
        parent::__construct(RelationsData::class);
    }
}
