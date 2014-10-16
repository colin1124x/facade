<?php namespace Rde;

abstract class Facade
{
    /** @var object $app 應用程序容器 */
    protected static $app;

    /**
     * 取得應用程序註冊名稱
     *
     * @return String
     * @throws \RuntimeException
     */
    protected static function getAccessName()
    {
        $class_name = get_called_class();
        throw new \RuntimeException("{$class_name}必須實作getName靜態方法");
    }

    /**
     * @return mixed 回傳應用程序實體
     */
    public static function getInstance()
    {
        $facade_name = static::getAccessName();

        return static::$app[$facade_name];
    }

    /**
     * @param \ArrayAccess $app 至少該實作ArrayAccess
     */
    public static function setApplication(\ArrayAccess $app)
    {
        self::$app = $app;
    }

    public static function getApplication()
    {
        return self::$app;
    }

    public static function __callStatic($method, $args)
    {
        $instance = static::getInstance();

        return is_string($instance) ?
            self::callStatic($instance, $method, $args) :
            self::callObject($instance, $method, $args);
    }

    private static function callObject($instance, $method, $args)
    {
        switch (count($args)) {
            case 0: return $instance->$method();
            case 1: return $instance->$method($args[0]);
            case 2: return $instance->$method($args[0], $args[1]);
            case 3: return $instance->$method($args[0], $args[1], $args[2]);
            case 4: return $instance->$method($args[0], $args[1], $args[2], $args[3]);
        }

        return call_user_func_array(array($instance, $method), $args);
    }

    private static function callStatic($class, $method, $args)
    {
        switch (count($args)) {
            case 0: return $class::$method();
            case 1: return $class::$method($args[0]);
            case 2: return $class::$method($args[0], $args[1]);
            case 3: return $class::$method($args[0], $args[1], $args[2]);
            case 4: return $class::$method($args[0], $args[1], $args[2], $args[3]);
        }

        return call_user_func_array("{$class}::{$method}", $args);
    }
}
