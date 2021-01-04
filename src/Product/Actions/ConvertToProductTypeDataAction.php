<?php

namespace Grixu\SociusClient\Product\Actions;

use Grixu\SociusClient\Product\DataTransferObjects\ProductTypeDataCollection;

class ConvertToProductTypeDataAction
{
    private ParseProductTypeAction $productTypeParser;

    public function __construct()
    {
        $this->productTypeParser = new ParseProductTypeAction();
    }

    public function execute(array $data): ProductTypeDataCollection
    {
        $finalData = collect($data)->map(function ($item) {
            return $this->productTypeParser->execute($item);
        })->toArray();

        return ProductTypeDataCollection::create($finalData);
    }
}
