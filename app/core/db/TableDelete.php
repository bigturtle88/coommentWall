<?php

namespace app\core\db;


interface TableDelete
{
    public function delete($arrConditions);
}