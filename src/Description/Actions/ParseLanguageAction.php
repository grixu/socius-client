<?php

namespace Grixu\SociusClient\Description\Actions;

use Illuminate\Support\Carbon;

class ParseLanguageAction
{
    public function execute(array $item): array
    {
        return [
            'id' => (int) $item['id'],
            'name' => $item['name'],
            'xlId' => (int) $item['xl_id'],
            'updatedAt' => Carbon::make($item['updated_at'])
        ];
    }
}
