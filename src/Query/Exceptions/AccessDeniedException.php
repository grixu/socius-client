<?php

namespace Grixu\SociusClient\Query\Exceptions;

use Exception;
use Illuminate\Support\Facades\Log;

/**
 * Class AccessDeniedException
 * @package Grixu\SociusClient\Query\Exceptions
 */
class AccessDeniedException extends Exception
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
        Log::channel('socius')->critical('Brak dostępu do modułu. Odpowiedź z serwera: ' . $this->responseBody);
    }
}
