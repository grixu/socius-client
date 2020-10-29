<?php

namespace Grixu\SociusClient\Query\Actions;

use Grixu\SociusClient\Query\DataTransferObjects\FilterDataCollection;
use Grixu\SociusClient\Query\DataTransferObjects\RequestQueryData;

/**
 * Class AddFilterAction
 * @package Grixu\SociusClient\Query\Actions
 */
class AddFilterAction
{
    public function execute(FilterDataCollection $filters, RequestQueryData $data, string $enumClass): RequestQueryData
    {
        $checkFilters = new CheckFiltersAction();

        if ($checkFilters->execute($filters, $enumClass)) {
            if (!empty($data->filters)) {
                $data->filters = FilterDataCollection::create(
                    collect([
                                $data->filters->toArray(),
                                $filters->toArray()
                            ])
                        ->unique()
                        ->flatten(1)
                        ->toArray()
                );
            } else {
                $data->filters = $filters;
            }
        }

        return $data;
    }
}
