<?php

namespace Grixu\SociusClient\Operator\DataTransferObjects;

use Grixu\SociusClient\Customer\DataTransferObjects\CustomerDataCollection;
use Illuminate\Support\Carbon;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Class OperatorData
 * @package Grixu\SociusClient\Operator\DataTransferObjects
 */
class OperatorData extends DataTransferObject
{
    public int $id;

    public string $name;

    public string $xlUsername;

    public string $email;

    public Carbon $syncTs;

    public int $xlId;

    public Carbon $updatedAt;

    public ?int $roleId;

    public ?OperatorRoleData $role;

    public ?CustomerDataCollection $customers;

    public ?BranchDataCollection $branches;
}
