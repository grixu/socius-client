<?php

namespace Grixu\SociusClient\Product\Actions;

use Illuminate\Support\Carbon;

/**
 * Class ParseProductTypeAction
 * @package Grixu\SociusClient\Product\Actions
 */
class ParseProductTypeAction
{
    public function execute(array $item): array
    {
        $products = null;
        if (!empty($item['products'])) {
            $helperAction = new ConvertToProductDataAction();
            $products = $helperAction->execute($item['products']);
        }

        return [
            'id' => (int) $item['id'],
            'name' => $item['name'],
            'updatedAt' => Carbon::make($item['updated_at']),
            'xlId' => (int) $item['xl_id'],
            'products' => $products,
        ];
    }
}
