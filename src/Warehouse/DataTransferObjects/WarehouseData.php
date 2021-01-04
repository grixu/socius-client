<?php

namespace Grixu\SociusClient\Warehouse\DataTransferObjects;

use Grixu\SociusClient\Customer\DataTransferObjects\CustomerData;
use Grixu\SociusClient\Operator\DataTransferObjects\OperatorData;
use Grixu\SociusClient\Warehouse\Enums\WarehouseLockEnum;
use Illuminate\Support\Carbon;
use Spatie\DataTransferObject\DataTransferObject;

class WarehouseData  extends DataTransferObject
{
    public int $id;
    public string $name;
    public string $desc;
    public bool $internal;
    public string $country;
    public bool $stockCounting;
    public ?Carbon $stockCountingDate;
    public WarehouseLockEnum $locked;
    public ?int $operatorId;
    public int $customerId;
    public ?Carbon $lastModification;
    public Carbon $syncTs;
    public Carbon $updatedAt;
    public int $xlId;
    public ?OperatorData $operator;
    public ?CustomerData $customer;
    public ?StockDataCollection $stocks;
}
