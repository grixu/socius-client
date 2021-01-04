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
            'receptionDate' => Carbon::make($item['reception_date']),
            'syncTs' => Carbon::make($item['sync_ts']),
            'updatedAt' => Carbon::make($item['updated_at']),
            'warehouseId' => (int) $item['warehouse_id'],
            'productId' => (int) $item['product_id'],
            'xlId' => (int) $item['xl_id'],
            'warehouse' => $warehouse,
            'product' => $product,
        ];
    }
}
