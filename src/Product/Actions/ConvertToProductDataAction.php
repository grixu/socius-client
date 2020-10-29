<?php

namespace Grixu\SociusClient\Product\Actions;

use Grixu\SociusClient\Product\DataTransferObjects\ProductDataCollection;

/**
 * Class ConvertToProductDataAction
 * @package Grixu\SociusClient\Product\Actions
 */
class ConvertToProductDataAction
{
    private ParseProductAction $productParser;

    /**
     * ConvertToProductDataAction constructor.
     */
    public function __construct()
    {
        $this->productParser = new ParseProductAction();
    }

    public function execute(array $data)
    {
        $finalData = collect($data)->map(function ($item) {
            return $this->productParser->execute($item);
        })->toArray();

        return ProductDataCollection::create($finalData);
    }
}
