<?php
namespace Marvinosswald\LaravelPayPal\Facades;

use Illuminate\Support\Facades\Facade;

class PayPal extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'Marvinosswald\\LaravelPayPal\\Contracts\\PayPalContract';
    }
}