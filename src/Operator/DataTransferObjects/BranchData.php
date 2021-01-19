<?php

namespace Grixu\SociusClient\Operator\DataTransferObjects;

class BranchData extends \Grixu\SociusModels\Operator\DataTransferObjects\BranchData
{
    public int $id;
    public ?OperatorDataCollection $operators;
}
