<?php

namespace Grixu\SociusClient\Warehouse\Actions;

use Grixu\SociusClient\Customer\Actions\ParseCustomerAction;
use Grixu\SociusClient\Customer\DataTransferObjects\CustomerData;
use Grixu\SociusClient\Operator\Actions\ParseOperatorAction;
use Grixu\SociusClient\Operator\DataTransferObjects\OperatorData;
use Grixu\SociusModels\Warehouse\Enums\WarehouseLockEnum;
use Illuminate\Support\Carbon;

class ParseWarehouseAction
{
    public function execute(array $item): array
    {
        $operator = null;
        if (!empty($item['operator'])) {
            $actionHelper = new ParseOperatorAction();
            $operator = new OperatorData($actionHelper->execute($item['operator']));
        }

        $customer = null;
        if (!empty($item['customer'])) {
            $actionHelper = new ParseCustomerAction();
            $customer = new CustomerData($actionHelper->execute($item['customer']));
        }

        $stocks = null;
        if (!empty($item['stocks'])) {
            $actionHelper = new ConvertToStockDataAction();
            $stocks = $actionHelper->execute($item['stocks']);
        }

        return [
            'id' => (int) $item['id'],
            'name' => (string) $item['name'],
            'desc' => (string) $item['desc'],
            'internal' => (bool) $item['internal'],
            'locked' => new WarehouseLockEnum($item['locked']),
            'country' => (string) $item['country'],
            'stockCounting' => (bool) $item['stockCounting'],
            'stockCountingDate' => Carbon::make($item['stockCountingDate']),
            'syncTs' => Carbon::make($item['syncTs']),
            'updatedAt' => Carbon::make($item['updatedAt']),
            'operatorId' => (int) $item['operatorId'],
            'customerId' => (int) $item['customerId'],
            'lastModification' => Carbon::make($item['lastModification']),
            'xlId' => (int) $item['xlId'],
            'operator' => $operator,
            'customer' => $customer,
            'stocks' => $stocks,
        ];
    }
}
