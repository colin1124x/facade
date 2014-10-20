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

    final public static function __callStatic($method, $args)
    {
        $instance = static::getInstance();

        return \Rde\call(
            is_string($instance) ? "{$instance}::{$method}" : array($instance, $method),
            $args);
    }
}
