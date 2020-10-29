<?php

namespace Grixu\SociusClient\Warehouse\Actions;

use Grixu\SociusClient\Warehouse\DataTransferObjects\WarehouseDataCollection;

/**
 * Class ConvertToWarehouseDataAction
 * @package Grixu\SociusClient\Warehouse\Actions
 */
class ConvertToWarehouseDataAction
{
    private ParseWarehouseAction $warehouseParser;

    /**
     * ConvertToWarehouseDataAction constructor.
     */
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
