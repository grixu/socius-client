<?php

namespace Grixu\SociusClient\Query\Actions;

use Grixu\SociusClient\Query\DataTransferObjects\RequestQueryData;

class AddIncludeAction
{
    public function execute(array $includes, RequestQueryData $data, string $enumClass): RequestQueryData
    {
        $checkFilters = new CheckParamArrayAction();

        if ($checkFilters->execute($includes, $enumClass)) {
            if (!empty($data->includes)) {
                $data->includes = array_unique(array_merge($data->includes, $includes));
            } else {
                $data->includes = $includes;
            }
        }

        return $data;
    }
}
