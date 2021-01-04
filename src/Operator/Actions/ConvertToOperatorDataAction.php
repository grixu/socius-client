<?php

namespace Grixu\SociusClient\Operator\Actions;

use Grixu\SociusClient\Operator\DataTransferObjects\OperatorDataCollection;

class ConvertToOperatorDataAction
{
    private ParseOperatorAction $operatorParser;

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
