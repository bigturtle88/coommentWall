<?php

namespace app\core\db;


interface TableUpdate
{
    public function update($arrParams, $arrConditions);
}