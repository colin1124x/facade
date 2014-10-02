<?php namespace Fake;

class MyService
{
    public function __call($method, $args)
    {
        return array(
            'method' => $method,
            'args' => $args,
        );
    }
}
