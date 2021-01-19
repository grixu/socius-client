<?php

namespace Grixu\SociusClient\Tests\Helpers;

use Grixu\ApiClient\ApiClient;
use Grixu\SociusClient\Query\Actions\MakeResultDataAction;
use Grixu\SociusClient\Query\DataTransferObjects\ResultData;

class TestCallApi
{
    private static function makeCall($url): ResultData
    {
        $helperAction = ApiClient::make('socius-client.api');
        $result = $helperAction->call($url);

        $helperAction = new MakeResultDataAction();
        return $helperAction->execute($result);
    }

    public static function forCollection(string $url):array
    {
        return self::makeCall($url)->data;
    }

    public static function forSingle(string $url): array
    {
        return self::makeCall($url)->data[0];
    }
}
