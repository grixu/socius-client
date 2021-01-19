<?php

namespace Grixu\SociusClient\Warehouse\DataTransferObjects;

use Grixu\SociusClient\Customer\DataTransferObjects\CustomerData;
use Grixu\SociusClient\Operator\DataTransferObjects\OperatorData;

class WarehouseData  extends \Grixu\SociusModels\Warehouse\DataTransferObjects\WarehouseData
{
    public int $id;
    public ?OperatorData $operator;
    public ?CustomerData $customer;
    public ?StockDataCollection $stocks;
}
