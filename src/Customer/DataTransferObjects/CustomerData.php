<?php

namespace Grixu\SociusClient\Customer\DataTransferObjects;

use Grixu\SociusClient\Operator\DataTransferObjects\OperatorData;

class CustomerData extends \Grixu\SociusModels\Customer\DataTransferObjects\CustomerData
{
    public int $id;
    public ?OperatorData $operator;
}
