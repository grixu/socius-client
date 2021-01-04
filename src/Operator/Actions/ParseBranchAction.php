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
            'xlId' => (int) $item['xl_id'],
            'syncTs' => Carbon::make($item['sync_ts']),
            'updatedAt' => Carbon::make($item['updated_at']),
            'operators' => $operators
        ];
    }
}
