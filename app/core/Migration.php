<?php


namespace app\core;

use app\core\db\DbAdapter;
use App;

class Migration
{
    private static $dbh;

    /**
     * Model constructor.
     */
    public function __construct()
    {
        $this->dbh = DbAdapter::getInstance();
        $this->dbh->config(\App::$config['db']);
    }

    public function creatTable($params)
    {
        $this->dbh->query($params);
    }
}