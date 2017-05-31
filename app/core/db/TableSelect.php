<?php

namespace app\core\db;


interface TableSelect
{
    public function read($arrParams, $arrConditions);
}