<?php

namespace Grixu\SociusClient\Warehouse\Actions;

use Grixu\SociusClient\Customer\Actions\ParseCustomerAction;
use Grixu\SociusClient\Customer\DataTransferObjects\CustomerData;
use Grixu\SociusClient\Operator\Actions\ParseOperatorAction;
use Grixu\SociusClient\Operator\DataTransferObjects\OperatorData;
use Grixu\SociusClient\Warehouse\Enums\WarehouseLockEnum;
use Illuminate\Support\Carbon;

/**
 * Class ParseWarehouseAction
 * @package Grixu\SociusClient\Warehouse\Actions
 */
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
            'stockCounting' => (bool) $item['stock_counting'],
            'stockCountingDate' => Carbon::make($item['stock_counting_date']),
            'syncTs' => Carbon::make($item['sync_ts']),
            'updatedAt' => Carbon::make($item['updated_at']),
            'operatorId' => (int) $item['operator_id'],
            'customerId' => (int) $item['customer_id'],
            'lastModification' => Carbon::make($item['last_modification']),
            'xlId' => (int) $item['xl_id'],
            'operator' => $operator,
            'customer' => $customer,
            'stocks' => $stocks,
        ];
    }
}
