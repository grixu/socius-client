<?php

namespace Grixu\SociusClient;

use Grixu\ApiClient\Config\JsonApiConfig;
use Grixu\ApiClient\Data\PaginatedData;
use Grixu\ApiClient\Data\StraightKeyParser;

class JsonApiConfigFactory
{
    public static function makeConfig(string $configName): JsonApiConfig
    {
        return new JsonApiConfig(
            baseUrl: config('socius-client.base_url'),
            responseDataClass: PaginatedData::class,
            responseParserClass: StraightKeyParser::class,
            authType: 'oAuth2',
            authUrl: config('socius-client.auth_url'),
            authData: config('socius-client.auth_data'),
            paginationParam: 'page',
            filters: config('socius-client.'.$configName.'.filters'),
            includes: config('socius-client.'.$configName.'.includes'),
            sorts: config('socius-client.'.$configName.'.sorts')
        );
    }

    public static function makeBasicConfig(): JsonApiConfig
    {
        return new JsonApiConfig(
            baseUrl: config('socius-client.base_url'),
            responseDataClass: PaginatedData::class,
            responseParserClass: StraightKeyParser::class,
            authType: 'oAuth2',
            authUrl: config('socius-client.auth_url'),
            authData: config('socius-client.auth_data'),
            paginationParam: 'page'
        );
    }
}
