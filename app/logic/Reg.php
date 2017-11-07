<?php

namespace app\logic;

use app\models\ModelMain;

class Reg
{
    static public function verification($token)
    {
        $serch = new ModelMain('users');
        $result = $serch->read(['id'], [$token['id']]);

        return $result;
    }

    static public function add($params)
    {

            (new ModelMain('users'))->creat(['id', 'name', 'email', 'token', 'create_at'],
                [$params['id'], $params['name'], $params['email'], 'NULL', date("Y-m-d H:i:s")]);

    }


}