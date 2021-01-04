<?php

namespace Grixu\SociusClient\Query\Actions;

use Exception;

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
