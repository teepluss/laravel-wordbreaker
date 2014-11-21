<?php namespace Teepluss\Wordbreaker\Facades;

use Illuminate\Support\Facades\Facade;

class Wordbreaker extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'wordbreaker'; }

}