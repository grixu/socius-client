<?php

namespace Grixu\SociusClient\Operator\Actions;

use Illuminate\Support\Carbon;

class ParseBranchAction
{
    public function execute(array $item): array
    {
        $operators = null;
        if (!empty($item['operators'])) {
            $actionHelper = new ConvertToOperatorDataAction();
            $operators = $actionHelper->execute($item['operators']);
        }

        return [
            'id' => (int) $item['id'],
            'name' => (string) $item['name'],
            'xlId' => (int) $item['xlId'],
            'syncTs' => Carbon::make($item['syncTs']),
            'updatedAt' => Carbon::make($item['updatedAt']),
            'operators' => $operators
        ];
    }
}
