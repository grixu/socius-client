<?php

namespace Grixu\SociusClient\Product\Actions;

use Grixu\SociusClient\Description\Actions\ConvertToDescriptionDataAction;
use Grixu\SociusClient\Product\Enums\ProductMeasureUnitEnum;
use Grixu\SociusClient\Product\Enums\ProductVatTypeEnum;
use Grixu\SociusClient\Warehouse\Actions\ConvertToStockDataAction;
use Illuminate\Support\Carbon;

class ParseProductAction
{
     public function execute(array $item)
    {
        $productType = null;
        if (!empty($item['product_type'])) {
            $actionHelper = new ParseProductTypeAction();
            $productType = $actionHelper->execute($item['product_type']);
        }

        $brand = null;
        if (!empty($item['brand'])) {
            $actionHelper = new ParseBrandAction();
            $brand = $actionHelper->execute($item['brand']);
        }

        $stocks = null;
        if (!empty($item['stocks'])) {
            $actionHelper = new ConvertToStockDataAction();
            $stocks = $actionHelper->execute($item['stocks']);
        }

        $descriptions = null;
        if (!empty($item['descriptions'])) {
            $actionHelper = new ConvertToDescriptionDataAction();
            $descriptions = $actionHelper->execute($item['descriptions']);
        }

        return [
            'id' => (int)$item['id'],
            'name' => $item['name'],
            'index' => $item['index'],
            'ean' => $item['ean'],
            'measureUnit' => new ProductMeasureUnitEnum($item['measure_unit']),
            'taxGroup' => new ProductVatTypeEnum($item['tax_group']),
            'taxValue' => (int)$item['tax_value'],
            'weight' => (double)$item['weight'],
            'xlId' => (int)$item['xl_id'],
            'operatorId' => !empty($item['operator_id']) ? (int)$item['operator_id'] : null,
            'brandId' => !empty($item['brand_id']) ? (int)$item['brand_id'] : null,
            'productTypeId' => !empty($item['product_type_id']) ? (int)$item['product_type_id'] : null,
            'syncTs' => Carbon::make($item['sync_ts']),
            'updatedAt' => Carbon::make($item['updated_at']),
            'eshop' => (bool)$item['eshop'],
            'availability' => (bool)$item['availability'],
            'attachments' => (bool)$item['attachments'],
            'archived' => (bool)$item['archived'],
            'blocked' => (bool)$item['archived'],
            'flags' => !empty($item['flags']) ? (int)$item['flags'] : null,
            'simplyLeaseCategory' => !empty($item['simply_lease_category']) ? (int)$item['simply_lease_category'] : null,
            'price' => !empty($item['price']) ? (float)$item['price'] : null,
            'eshopPrice' => !empty($item['eshop_price']) ? (float)$item['eshop_price'] : null,
            'priceUpdated' => Carbon::make($item['price_updated']),
            'brand' => $brand,
            'productType' => $productType,
            'stocks' => $stocks,
            'descriptions' => $descriptions,
        ];
    }
}
