<?php

namespace app\core;

use app\core\db\TableInsert;
use app\core\db\TableSelect;
use app\core\db\TableUpdate;
use app\core\db\TableDelete;
use app\core\db\DbAdapter;
use App;

/**
 * Class Model
 * @package app\core
 */
class Model implements TableInsert, TableSelect, TableUpdate, TableDelete
{
    private static $dbh;
    public $row;
    public $result;
    public $data = array();
    private $tableName;

    /**
     * Model constructor.
     */
    public function __construct($tableName)
    {
        $this->tableName = $tableName;
        $this->dbh = DbAdapter::getInstance();
        $this->dbh->config(\App::$config['db']);
    }

    public function create($arrColumns, $arrValues)
    {
        if (isset($arrColumns) && isset($arrValues)) {
            $tableName = $this->tableName;
            $columns =  implode(', ', $arrColumns);
            $value  =  implode(', ', $arrValues);
            $sql = "INSERT INTO {$tableName} ( {$columns} ) VALUES ( {$value} )";
            $stm = $this->dbh->query($sql);

             return true;
        }
        return false;
    }

    public function read($arrParams, $arrConditions = null)
    {
        $sql = null;

        if (isset($arrParams)) {
            $params = implode(', ', $arrParams);
            $sql = "SELECT $params FROM  $this->tableName;";
        }
        if (isset($arrConditions)) {
            $sql .= ' WHERE ';
            $condition = implode(' AND WHERE ', $arrConditions);
            $sql .= $condition;
        }
        if (isset($sql)) {
           $a =  $this->dbh
                ->query('SELECT id FROM comments');

            var_dump(   $a->fetch()  );die();
            return $result ;
        }
        return false;

    }

}

