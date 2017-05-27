<?php

/**
 * Class app
 */
class App
{
    private static $config;

    public static function execute($config)
    {
        self::$config = $config;

        \app\Router::execute(self::$config);
    }

    public static function baseUrl()
    {
        return \app\Router::baseUrl();
    }


}
