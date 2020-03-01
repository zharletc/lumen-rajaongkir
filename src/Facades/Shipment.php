<?php

namespace Zharletc\Facades;

use Illuminate\Support\Facades\Facade;

class Shipment extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'shipment';
    }
}
