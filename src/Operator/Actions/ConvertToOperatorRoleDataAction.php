<?php

namespace Grixu\SociusClient\Operator\Actions;

use Grixu\SociusClient\Operator\DataTransferObjects\OperatorRoleDataCollection;

class ConvertToOperatorRoleDataAction
{
    private ParseOperatorRoleAction $operatorRoleParser;

    public function __construct()
    {
        $this->operatorRoleParser = new ParseOperatorRoleAction();
    }

    public function execute(array $data): OperatorRoleDataCollection
    {
        $finalData = collect($data)->map(function ($item) {
            return $this->operatorRoleParser->execute($item);
        })->toArray();

        return OperatorRoleDataCollection::create($finalData);
    }
}
