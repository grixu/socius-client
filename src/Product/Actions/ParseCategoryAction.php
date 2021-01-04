<?php

namespace Grixu\SociusClient\Product\Actions;

use Grixu\SociusClient\Product\DataTransferObjects\CategoryData;
use Illuminate\Support\Carbon;

class ParseCategoryAction
{
    public function execute(array $item): array
    {
        $parent = null;
        if (!empty($item['parent'])) {
            $parent = new CategoryData($this->execute($item['parent']));
        }

        $children = null;
        if (!empty($item['children'])) {
            $helperAction = new ConvertToCategoryDataAction();
            $children = $helperAction->execute($item['children']);
        }

       return [
            'id' => $item['id'],
            'name' => $item['name'],
            'syncTs' => Carbon::make($item['sync_ts']),
            'updatedAt' => Carbon::make($item['updated_at']),
            'xlId' => (int)$item['xl_id'],
            'parentId' => (int)$item['parent_id'],
            'parent' => $parent,
            'children' => $children,
        ];
    }
}
