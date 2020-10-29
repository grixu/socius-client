<?php

namespace Grixu\SociusClient\Query\Actions;

use Exception;

/**
 * Class CheckParamArrayAction
 * @package Grixu\SociusClient\Query\Actions
 */
class CheckParamArrayAction
{
    public function execute(array $filters, string $enumClass)
    {
        foreach ($filters as $filter) {
            try {
                new $enumClass($filter);
            } catch (Exception $exception) {
                return false;
            }
        }

        return true;
    }
}
