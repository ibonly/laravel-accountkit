<?php

namespace Ibonly\FacebookAccountKit\Facades;

use Illuminate\Support\Facades\Facade;

class FacebookAccountKitFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'AccountKit';
    }
}
