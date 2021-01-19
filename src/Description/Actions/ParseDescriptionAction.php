<?php

namespace Grixu\SociusClient\Description\Actions;

use Grixu\SociusClient\Description\DataTransferObjects\LanguageData;
use Grixu\SociusClient\Product\Actions\ParseProductAction;
use Grixu\SociusClient\Product\DataTransferObjects\ProductData;
use Illuminate\Support\Carbon;

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
            'productId' => (int) $item['productId'],
            'languageId' => (int) $item['languageId'],
            'pageTitle' => (string) $item['pageTitle'],
            'keywords' => (string) $item['keywords'],
            'shortDesc' => (string) $item['shortDesc'],
            'metaDesc' => (string) $item['metaDesc'],
            'url' => (string) $item['url'],
            'lastModification' => Carbon::make($item['lastModification']),
            'lastModificationDesc' => Carbon::make($item['lastModificationDesc']),
            'xlId' => (int) $item['xlId'],
            'syncTs' => Carbon::make($item['syncTs']),
            'updatedAt' => Carbon::make($item['updatedAt']),
            'language' => $language,
            'product' => $product,
        ];
    }
}
