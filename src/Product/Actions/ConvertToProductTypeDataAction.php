<?php

namespace Grixu\SociusClient\Product\Actions;

use Grixu\SociusClient\Product\DataTransferObjects\ProductTypeDataCollection;

/**
 * Class ParseProductTypeAction
 * @package Grixu\SociusClient\Product\Actions
 */
class ConvertToProductTypeDataAction
{
    private ParseProductTypeAction $productTypeParser;

    /**
     * ConvertToProductTypeDataAction constructor.
     */
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
