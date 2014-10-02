<?php namespace Fake;

class Application implements \ArrayAccess
{
    private $collection = array();

    public function offsetExists($k)
    {
        return array_key_exists($k, $this->collection);
    }

    public function offsetGet($k)
    {
        return $this->collection[$k];
    }

    public function offsetSet($k, $v)
    {
        $this->collection[$k] = $v;
    }

    public function offsetUnset($k)
    {
        unset($this->collection[$k]);
    }
}
