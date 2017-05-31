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

    /**
     * @param $arrColumns
     * @param $arrValues
     * @return bool
     */
    public function create($arrColumns, $arrValues)
    {
        if (isset($arrColumns) && isset($arrValues)) {
            $tableName = $this->tableName;
            $columns = implode(', ', $arrColumns);
            $value = implode(', ', $arrValues);
            $sql = "INSERT INTO {$tableName} ( {$columns} ) VALUES ( {$value} )";
            $stm = $this->dbh->query($sql);

            return true;
        }
        return false;
    }

    /**
     * @param $arrParams
     * @param null $arrConditions
     * @return bool
     */
    public function read($arrParams, $arrConditions = null)
    {
        $sql = null;
        if (isset($arrParams)) {
            $params = implode(', ', $arrParams);
            $sql = "SELECT {$params} FROM  {$this->tableName} ";

            if (isset($arrConditions)) {
                $sql .= ' WHERE ';
                $condition = implode(' AND WHERE ', $arrConditions);
                $sql .= $condition;
            }
        }
        if (isset($sql)) {
            $sql = addslashes($sql);
            $stm = $this->dbh->query($sql);
            $result = $stm->fetchColumn();
            return $result;
        }
        return false;

    }

    /**
     * @param $arrParams
     * @param null $arrConditions
     * @return bool
     */
    public function update($arrParams, $arrConditions = null)
    {
        $sql = null;
        if (isset($arrParams)) {
            $params = implode(', ', $arrParams);
            $sql = "UPDATE  {$this->tableName} SET {$params}";

            if (isset($arrConditions)) {
                $sql .= ' WHERE ';
                $condition = implode(' AND WHERE ', $arrConditions);
                $sql .= $condition;
            }
        }
        if (isset($sql)) {
            $stm = $this->dbh->query($sql);
            return true;
        }
        return false;
    }

    public function delete($arrConditions)
    {
        if (isset($arrConditions)) {
            $tableName = $this->tableName;
            $conditions = implode(', ', $arrConditions);
            $sql = "DELETE FROM {$tableName} WHERE {$conditions}";
            $stm = $this->dbh->query($sql);
            return true;
        }
        return false;

    }

}

