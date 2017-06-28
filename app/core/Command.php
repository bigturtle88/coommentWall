<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 28.06.2017
 * Time: 11:01
 */

namespace app\core;

class Command
{
    private static $instance;
    private static $com;

    private function __construct()
    {
        // TODO: Implement __get() method.
    }

    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

    private function __wekeup()
    {

    }

    public static function getInstance()
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public static function execute($com = null)
    {
        self::$com = $com;

        if (!isset(self::$com) && !method_exists(__CLASS__, self::$com)) {
            return false;
        }
        $action = self::$com;

        self::$action();
    }

    public static function migrate()
    {
        $migrations = array_diff(scandir(__DIR__ . '\\..\\..\\' . \App::$config['dir']['migrations']), array('..', '.'));

        foreach ($migrations as $migration) {
            $migration = str_replace('.php', '', $migration);
            echo "Create migration " . $migration . "\n";
            $migration = \App::$config['dir']['migrations'] . '\\' . $migration;
            (new $migration)->creat();
        }

    }

}