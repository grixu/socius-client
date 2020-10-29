<?php

namespace Grixu\SociusClient\Query\Actions;

use Grixu\SociusClient\Query\DataTransferObjects\FilterDataCollection;
use Exception;

/**
 * Class CheckFiltersAction
 * @package Grixu\SociusClient\Query\Actions
 */
class CheckFiltersAction
{
    public function execute(FilterDataCollection $filters, string $enumClass)
    {
        foreach ($filters as $filter) {
            try {
                new $enumClass($filter->field);
            } catch (Exception $exception) {
                return false;
            }
        }

        return true;
    }
}
