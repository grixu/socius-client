<?php

namespace Grixu\SociusClient\Query\Exceptions;

use Exception;
use Illuminate\Support\Facades\Log;

/**
 * Class TokenIssueException
 * @package Grixu\SociusClient\Query\Exceptions
 */
class TokenIssueException extends Exception
{
    private string $responseBody;

    /**
     * TokenIssueException constructor.
     * @param $responseBody
     */
    public function __construct($responseBody)
    {
        $this->responseBody = $responseBody;
        parent::__construct();
    }

    public function report()
    {
        Log::channel('socius')->critical('Błąd uzyskiwania token OAuth. Odpowiedź z serwera' . $this->responseBody);
    }
}
