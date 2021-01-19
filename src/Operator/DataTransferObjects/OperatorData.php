<?php

namespace Grixu\SociusClient\Operator\DataTransferObjects;

use Grixu\SociusClient\Customer\DataTransferObjects\CustomerDataCollection;

class OperatorData extends \Grixu\SociusModels\Operator\DataTransferObjects\OperatorData
{
    public int $id;
    public ?OperatorRoleData $role;
    public ?CustomerDataCollection $customers;
    public ?BranchDataCollection $branches;
}
