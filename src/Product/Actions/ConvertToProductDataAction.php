<?php

namespace Grixu\SociusClient\Product\Actions;

use Grixu\SociusClient\Product\DataTransferObjects\ProductDataCollection;

class ConvertToProductDataAction
{
    private ParseProductAction $productParser;

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
