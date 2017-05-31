<?php

namespace app\core\db;


interface TableInsert
{
    public function create($arrColumns, $arrValues);
}