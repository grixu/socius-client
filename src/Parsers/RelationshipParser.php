<?php

namespace Grixu\SociusClient\Parsers;

use Grixu\RelationshipDataTransferObject\RelationshipData;
use Grixu\SociusClient\Abstracts\ApiRelationshipParser;

class RelationshipParser extends ApiRelationshipParser
{
    public function __construct()
    {
        parent::__construct(RelationshipData::class);
    }
}
