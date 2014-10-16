<?php namespace Fake;

use \Rde\Facade;

class StaticFacade extends Facade
{
    protected static function getAccessName()
    {
        return 'test.static';
    }
}
