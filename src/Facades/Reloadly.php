<?php

namespace Ghanem\Reloadly\Facades;

use Illuminate\Support\Facades\Facade;

class Reloadly extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'ghanem-reloadly';
    }
}