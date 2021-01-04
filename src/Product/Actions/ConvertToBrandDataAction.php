<?php

namespace Grixu\SociusClient\Product\Actions;

use Grixu\SociusClient\Product\DataTransferObjects\BrandDataCollection;

class ConvertToBrandDataAction
{
    private ParseBrandAction $brandParser;

    public function __construct()
    {
        $this->brandParser = new ParseBrandAction();
    }

    public function execute(array $data)
    {
        $finalData = collect($data)->map(function ($item) {
            return $this->brandParser->execute($item);
        })->toArray();

        return BrandDataCollection::create($finalData);
    }
}
