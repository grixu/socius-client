<?php

namespace Grixu\SociusClient\Product\Actions;

use Grixu\SociusClient\Product\DataTransferObjects\CategoryDataCollection;

/**
 * Class ConvertToCategoryDataAction
 * @package Grixu\SociusClient\Product\Actions
 */
class ConvertToCategoryDataAction
{
    private ParseCategoryAction $categoryParser;

    /**
     * ConvertToCategoryDataAction constructor.
     */
    public function __construct()
    {
        $this->categoryParser = new ParseCategoryAction();
    }

    public function execute(array $data)
    {
        $arrFinalData = collect($data)->map(function ($item) {
            return $this->categoryParser->execute($item);
        })->toArray();

        return CategoryDataCollection::create($arrFinalData);
    }
}
