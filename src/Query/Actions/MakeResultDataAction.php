<?php

namespace Grixu\SociusClient\Query\Actions;

use Grixu\SociusClient\Query\DataTransferObjects\ResultData;

/**
 * Class MakeResultDataAction
 * @package Grixu\SociusClient\Query\Actions
 */
class MakeResultDataAction
{
    public function execute(array $responseData): ?ResultData
    {
        if (!array_key_exists('data', $responseData)) {
            return null;
        }

        $requiredKeys = ['data', 'current_page', 'last_page', 'per_page', 'total', 'from', 'to'];
        foreach ($requiredKeys as $key) {
            if (!array_key_exists($key, $responseData['data'])) {
                return null;
            }
        }

        return new ResultData(
            [
                'data' => $responseData['data']['data'],
                'currentPage' => $responseData['data']['current_page'],
                'lastPage' => $responseData['data']['last_page'],
                'perPage' => $responseData['data']['per_page'],
                'total' => $responseData['data']['total'],
                'from' => $responseData['data']['from'],
                'to' => $responseData['data']['to'],
                'nextPageUrl' => $responseData['data']['next_page_url']
            ]
        );
    }
}
