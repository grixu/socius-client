<?php

namespace Grixu\SociusClient\Support\Tests;

use Grixu\SociusClient\Query\Actions\CallApiAction;
use Grixu\SociusClient\Query\Actions\MakeResultDataAction;
use Grixu\SociusClient\Query\DataTransferObjects\ResultData;

/**
 * Class TestCallApi
 * @package Support\Tests
 */
class TestCallApi
{
    private static function makeCall($url): ResultData
    {
        $helperAction = new CallApiAction();
        $result = $helperAction->execute($url);

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
