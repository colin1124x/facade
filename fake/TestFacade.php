<?php namespace Fake;

use \Rde\Facade;

class TestFacade extends Facade
{
    protected static function getAccessName()
    {
        return 'test';
    }
}
