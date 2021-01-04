<?php

namespace Grixu\SociusClient\Warehouse\Actions;

use Grixu\SociusClient\Warehouse\DataTransferObjects\StockDataCollection;

class ConvertToStockDataAction
{
    private ParseStockAction $stockParser;

    public function __construct()
    {
        $this->stockParser = new ParseStockAction();
    }


    public function execute(array $data): StockDataCollection
    {
        $finalData = collect($data)->map(function ($item) {
            return $this->stockParser->execute($item);
        })->toArray();

        return StockDataCollection::create($finalData);
    }
}
