<?php

namespace Grixu\SociusClient;

use Illuminate\Support\Facades\Facade;

class SociusClientFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'socius-client';
    }
}
