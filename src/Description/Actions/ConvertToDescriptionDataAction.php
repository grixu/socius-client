<?php

namespace Grixu\SociusClient\Description\Actions;

use Grixu\SociusClient\Description\DataTransferObjects\ProductDescriptionDataCollection;

class ConvertToDescriptionDataAction
{
    private ParseDescriptionAction $descriptionParser;

    public function __construct()
    {
        $this->descriptionParser = new ParseDescriptionAction();
    }


    public function execute(array $data): ProductDescriptionDataCollection
    {
        $finalData = collect($data)->map(function ($item) {
            return $this->descriptionParser->execute($item);
        })->toArray();

        return ProductDescriptionDataCollection::create($finalData);
    }
}
