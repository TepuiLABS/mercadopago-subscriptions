<?php

namespace Tepuilabs\MercadopagoSubscriptions;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Tepuilabs\MercadopagoSubscriptions\MercadopagoSubscriptions
 */
class MercadopagoSubscriptionsFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'MercadopagoSubscriptions';
    }
}
