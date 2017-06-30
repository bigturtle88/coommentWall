<?php

namespace app\core\db;

use PDO;

/**
 * Class DbAdapter
 * @package app\core\db
 */
class DbAdapter
{
    private static $instance;
    private static $params;
    private static $user;
    private static $pass;
    private static $dbh;
    private static $opt;

    /**
     * DbAdapter constructor.
     */
    private function __construct()
    {
    }

    /**
     *
     */
    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

    /**
     *
     */
    private function __wakeup()
    {
        // TODO: Implement __wakeup() method.
    }

    /**
     * @return mixed
     */
    public static function getInstance()
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * @param $config
     */
    public function config($config)
    {
        self::$params = $config['params'];
        self::$user = $config['user'];
        self::$pass = $config['pass'];
        self::$opt = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];
        self::connect();
    }

    /**
     *
     */
    private function connect()
    {
        self::$dbh = new PDO(self::$params, self::$user, self::$pass, self::$opt);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function query($sql)
    {
        if (isset($sql)) {

            return self::$dbh->query($sql);

        }
        return false;

    }

    /**
     *
     */
    public function end()
    {
        static::$dbh = null;

    }


}