<?php

namespace Grixu\SociusClient\Product\Actions;

use Grixu\SociusClient\Description\Actions\ConvertToDescriptionDataAction;
use Grixu\SociusClient\Warehouse\Actions\ConvertToStockDataAction;
use Grixu\SociusModels\Product\Enums\ProductMeasureUnitEnum;
use Grixu\SociusModels\Product\Enums\ProductVatTypeEnum;
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
            'measureUnit' => new ProductMeasureUnitEnum($item['measureUnit']),
            'taxGroup' => new ProductVatTypeEnum($item['taxGroup']),
            'taxValue' => (int)$item['taxValue'],
            'weight' => (double)$item['weight'],
            'xlId' => (int)$item['xlId'],
            'operatorId' => !empty($item['operatorId']) ? (int)$item['operatorId'] : null,
            'brandId' => !empty($item['brandId']) ? (int)$item['brandId'] : null,
            'productTypeId' => !empty($item['productTypeId']) ? (int)$item['productTypeId'] : null,
            'syncTs' => Carbon::make($item['syncTs']),
            'updatedAt' => Carbon::make($item['updatedAt']),
            'eshop' => (bool)$item['eshop'],
            'availability' => (bool)$item['availability'],
            'attachments' => (bool)$item['attachments'],
            'archived' => (bool)$item['archived'],
            'blocked' => (bool)$item['archived'],
            'flags' => !empty($item['flags']) ? (int)$item['flags'] : null,
            'price' => !empty($item['price']) ? (float)$item['price'] : null,
            'eshopPrice' => !empty($item['eshopPrice']) ? (float)$item['eshopPrice'] : null,
            'priceUpdated' => Carbon::make($item['priceUpdated']),
            'brand' => $brand,
            'productType' => $productType,
            'stocks' => $stocks,
            'descriptions' => $descriptions,
        ];
    }
}
