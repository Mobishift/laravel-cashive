<?php namespace Mobishift\LaravelCashive\Facades;

use Illuminate\Support\Facades\Facade;

class LaravelCashive extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'cashive'; }

}