<?php

namespace Grixu\SociusClient\Query\Actions;

use Grixu\SociusClient\Query\Exceptions\ApiCallException;
use Grixu\SociusClient\Query\Exceptions\WrongConfigException;
use Illuminate\Support\Facades\Http;

/**
 * Class CallApiAction
 * @package Grixu\SociusClient\Query\Actions
 */
class CallApiAction
{
    private GetTokenAction $getToken;

    /**
     * CallApiAction constructor.
     */
    public function __construct()
    {
        $this->getToken = new GetTokenAction();
    }

    /**
     * @param string $url
     * @return array|false|mixed
     * @throws \Grixu\SociusClient\Query\Exceptions\ApiCallException
     * @throws \Grixu\SociusClient\Query\Exceptions\WrongConfigException
     * @throws \Grixu\SociusClient\Query\Exceptions\TokenIssueException
     */
    public function execute(string $url)
    {
        if (empty(config('socius-client.base_url'))
            || empty(config('socius-client.client_key'))
            || empty(config('socius-client.client_id'))) {
            throw new WrongConfigException();
        }

        $token = $this->getToken->execute();

        $client = Http::withToken($token)
            ->withHeaders(
                [
                    'Accept' => 'application/json'
                ]
            )
            ->get($url);

        if ($client->successful()) {
            return $client->json();
        }

        if ($client->failed()) {
            if ($client->status() === 401) {
                $resetTokenAction = new ResetTokenAction();
                $resetTokenAction->execute();
                // Token refreshed, then try again
                return $this->execute($url);
            }
        }

        throw new ApiCallException($url, $client->body());
    }
}
