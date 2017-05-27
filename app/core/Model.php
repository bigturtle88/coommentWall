<?php

namespace app\core;
/**
 * Class Model
 * @package app\core
 */
abstract class Model
{
    public $dbh;
    public $row;
    public $result;
    public $data = array();

    /**
     * Model constructor.
     */
    public function __construct()
    {

    }

}

