<?php

namespace Grixu\SociusClient\Query\Actions;

use Grixu\SociusClient\Query\DataTransferObjects\RequestQueryData;

class PrepareQueryAction
{
    public function execute(RequestQueryData $queryData): string
    {
        $queryString = '?';

        if (!empty($queryData->filters) && $queryData->filters->count() > 0) {
            foreach ($queryData->filters as $filter) {
                $queryString .= 'filter['.$filter->field.']=' . collect($filter->values)->join(',');
            }
        }

        if (!empty($queryData->includes) && count($queryData->includes) > 0) {
            if (strlen($queryString) > 1) {
                $queryString .= '&';
            }
            $queryString .= 'include=';

            $queryString .= collect($queryData->includes)->join(',');
        }

        if (!empty($queryData->sorts) && count($queryData->sorts) > 0) {
            if (strlen($queryString) > 1) {
                $queryString .= '&';
            }
            $queryString .= 'sort=';

            $queryString .= collect($queryData->sorts)->join(',');
        }

        if (!empty($queryData->page)) {
            if (strlen($queryString) > 1) {
                $queryString .= '&';
            }
            $queryString .= 'page='.$queryData->page;
        }

        return $queryString;
    }
}
