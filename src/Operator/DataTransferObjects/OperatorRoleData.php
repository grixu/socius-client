<?php

namespace Grixu\SociusClient\Operator\DataTransferObjects;

class OperatorRoleData extends \Grixu\SociusModels\Operator\DataTransferObjects\OperatorRoleData
{
    public int $id;
    public ?OperatorDataCollection $operators;
}
