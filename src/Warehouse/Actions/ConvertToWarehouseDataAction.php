<?php

namespace Grixu\SociusClient\Warehouse\Actions;

use Grixu\SociusClient\Warehouse\DataTransferObjects\WarehouseDataCollection;

class ConvertToWarehouseDataAction
{
    private ParseWarehouseAction $warehouseParser;

    public function __construct()
    {
        $this->warehouseParser = new ParseWarehouseAction();
    }

    public function execute(array $data): WarehouseDataCollection
    {
        $finalData = collect($data)->map(function ($item) {
            return $this->warehouseParser->execute($item);
        })->toArray();

        return WarehouseDataCollection::create($finalData);
    }
}
