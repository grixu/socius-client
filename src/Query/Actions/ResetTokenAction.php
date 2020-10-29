<?php

namespace Grixu\SociusClient\Query\Actions;

use Illuminate\Support\Facades\Cache;

class ResetTokenAction
{
    private GetTokenAction $action;

    /**
     * ResetTokenAction constructor.
     */
    public function __construct()
    {
        $this->action = new GetTokenAction();
    }

    public function execute(): string
    {
        Cache::forget('socius-token');
        return $this->action->execute();
    }
}
