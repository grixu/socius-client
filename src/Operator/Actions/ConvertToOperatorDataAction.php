<?php

namespace Grixu\SociusClient\Operator\Actions;

use Grixu\SociusClient\Operator\DataTransferObjects\OperatorDataCollection;

/**
 * Class ConvertToOperatorDataAction
 * @package Grixu\SociusClient\Operator\Actions
 */
class ConvertToOperatorDataAction
{
    private ParseOperatorAction $operatorParser;

    /**
     * ConvertToOperatorDataAction constructor.
     */
    public function __construct()
    {
        $this->operatorParser = new ParseOperatorAction();
    }

    public function execute(array $data): OperatorDataCollection
    {
        $finalData = collect($data)->map(function ($item) {
            return $this->operatorParser->execute($item);
        })->toArray();

        return OperatorDataCollection::create($finalData);
    }
}
