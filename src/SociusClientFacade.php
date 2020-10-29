<?php

namespace Grixu\SociusClient;

use Illuminate\Support\Facades\Facade;

/**
 * Class SociusFacade
 * @package App\Socius
 */
class SociusClientFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'socius-client';
    }
}
