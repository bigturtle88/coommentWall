<?php

/**
 * Class app
 */
class App
{
    public static $config;

    public static function execute($config)
    {
        self::$config = $config;

        \app\Router::execute(self::$config['router']);
    }

    public static function console($config)
    {
        self::$config = $config;
    }

    public static function baseUrl()
    {
        return \app\Router::baseUrl();
    }


}
