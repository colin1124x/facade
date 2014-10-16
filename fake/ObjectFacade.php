<?php namespace Fake;

use \Rde\Facade;

class ObjectFacade extends Facade
{
    protected static function getAccessName()
    {
        return 'test.object';
    }
}
