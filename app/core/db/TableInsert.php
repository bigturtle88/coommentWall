<?php

namespace app\core\db;


interface TableInsert
{
    public function creat($arrColumns, $arrValues);
}