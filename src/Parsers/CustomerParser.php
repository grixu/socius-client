<?php

namespace Grixu\SociusClient\Parsers;

use Grixu\SociusClient\Abstracts\ApiParser;
use Grixu\SociusModels\Customer\DataTransferObjects\CustomerData;

class CustomerParser extends ApiParser
{
    public function __construct()
    {
        parent::__construct(CustomerData::class);
    }
}
