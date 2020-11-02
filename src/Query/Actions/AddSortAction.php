<?php

namespace Grixu\SociusClient\Query\Actions;

use Grixu\SociusClient\Query\DataTransferObjects\RequestQueryData;

/**
 * Class AddSortAction
 * @package Grixu\SociusClient\Query\Actions
 */
class AddSortAction
{
    public function execute(array $sorts, RequestQueryData $data, string $enumClass): RequestQueryData
    {
        $checkFilters = new CheckParamArrayAction();

        if ($checkFilters->execute($sorts, $enumClass)) {
            if (!empty($data->sorts)) {
                $data->sorts = array_unique(array_merge($data->sorts, $sorts));
            } else {
                $data->sorts = $sorts;
            }
        }

        return $data;
    }
}
