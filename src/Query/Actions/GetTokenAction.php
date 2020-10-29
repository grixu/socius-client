<?php

namespace Grixu\SociusClient\Query\Actions;

use Grixu\SociusClient\Query\Exceptions\TokenIssueException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

/**
 * Class GetTokenAction
 * @package Grixu\SociusClient\Query\Actions
 */
class GetTokenAction
{
    /**
     * @return string|null
     * @throws TokenIssueException
     */
    public function execute(): ?string
    {
        $token = Cache::get('socius-token');

        if (!$token) {
            $tokenRequest = Http::withHeaders(
                [
                    'Accept' => 'application/json'
                ]
            )
                ->post(
                    config('socius-client.oauth'),
                    [
                        'grant_type' => 'client_credentials',
                        'client_id' => config('socius-client.client_id'),
                        'client_secret' => config('socius-client.client_key'),
                        'scope' => '*',
                    ]
                );

            if (!$tokenRequest->successful()) {
                throw new TokenIssueException($tokenRequest->body());
            }

            $token = $tokenRequest->json('access_token');
            Cache::add('socius-token', $token);
        }

        return $token;
    }
}
