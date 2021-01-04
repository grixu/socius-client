<?php

namespace Grixu\SociusClient\Description\Actions;

use Grixu\SociusClient\Description\DataTransferObjects\LanguageDataCollection;

class ConvertToLanguageDataAction
{
    private ParseLanguageAction $languageParser;

    public function __construct()
    {
        $this->languageParser = new ParseLanguageAction();
    }

    public function execute(array $data): LanguageDataCollection
    {
        $finalData = collect($data)->map(function ($item) {
            return $this->languageParser->execute($item);
        })->toArray();

        return LanguageDataCollection::create($finalData);
    }
}
