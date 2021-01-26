<?php

namespace Grixu\SociusClient\Warehouse\Actions;

use Grixu\SociusClient\Product\Actions\ParseProductAction;
use Grixu\SociusClient\Product\DataTransferObjects\ProductData;
use Grixu\SociusClient\Warehouse\DataTransferObjects\WarehouseData;
use Illuminate\Support\Carbon;

class ParseStockAction
{
    public function execute(array $item): array
    {
        $product = null;
        if (!empty($item['product'])) {
            $actionHelper = new ParseProductAction();
            $product = new ProductData($actionHelper->execute($item['product']));
        }

        $warehouse = null;
        if (!empty($item['warehouse'])) {
            $actionHelper = new ParseWarehouseAction();
            $warehouse = new WarehouseData($actionHelper->execute($item['warehouse']));
        }

        return [
            'id' => (int) $item['id'],
            'amount' => (double) $item['amount'],
            'receptionDate' => Carbon::make($item['receptionDate']),
            'syncTs' => Carbon::make($item['syncTs']),
            'updatedAt' => Carbon::make($item['updatedAt']),
            'warehouseId' => (int) $item['warehouseId'],
            'productId' => (int) $item['productId'],
            'xlId' => (string) $item['xlId'],
            'warehouse' => $warehouse,
            'product' => $product,
        ];
    }
}
