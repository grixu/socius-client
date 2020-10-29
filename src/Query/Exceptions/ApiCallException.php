<?php

namespace Grixu\SociusClient\Query\Exceptions;

use Exception;
use Illuminate\Support\Facades\Log;

/**
 * Class ApiCallException
 * @package Grixu\SociusClient\Query\Exceptions
 */
class ApiCallException extends Exception
{
    private string $url;
    private string $responseBody;

    public function __construct(string $url, $responseBody)
    {
        $this->url = $url;
        $this->responseBody = $responseBody;
        parent::__construct();
    }

    /**
     * Report this exception to special log
     */
    public function report()
    {
        Log::channel('socius')->critical('Błąd zapytania do Socius API. URL: ' . $this->url);
        Log::channel('socius')->critical('Odpowiedź z serwera ' . $this->responseBody);
    }
}
