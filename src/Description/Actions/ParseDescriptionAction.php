<?php

namespace Grixu\SociusClient\Description\Actions;

use Grixu\SociusClient\Description\DataTransferObjects\LanguageData;
use Grixu\SociusClient\Product\Actions\ParseProductAction;
use Grixu\SociusClient\Product\DataTransferObjects\ProductData;
use Illuminate\Support\Carbon;

/**
 * Class ParseDescriptionAction
 * @package Grixu\SociusClient\Description\Actions
 */
class ParseDescriptionAction
{
    public function execute(array $item): array
    {
        $language = null;
        if (!empty($item['language'])) {
            $helperAction = new ParseLanguageAction();
            $language = new LanguageData($helperAction->execute($item['language']));
        }

        $product = null;
        if (!empty($item['product'])) {
            $helperAction = new ParseProductAction();
            $product = new ProductData($helperAction->execute($item['product']));
        }

        return [
            'id' => (int) $item['id'],
            'name' => (string) $item['name'],
            'desc' => (string) $item['desc'],
            'productId' => (int) $item['product_id'],
            'languageId' => (int) $item['language_id'],
            'pageTitle' => (string) $item['page_title'],
            'keywords' => (string) $item['keywords'],
            'shortDesc' => (string) $item['short_desc'],
            'metaDesc' => (string) $item['meta_desc'],
            'url' => (string) $item['url'],
            'lastModification' => Carbon::make($item['last_modification']),
            'lastModificationDesc' => Carbon::make($item['last_modification_desc']),
            'xlId' => (int) $item['xl_id'],
            'syncTs' => Carbon::make($item['sync_ts']),
            'updatedAt' => Carbon::make($item['updated_at']),
            'language' => $language,
            'product' => $product,
        ];
    }
}
