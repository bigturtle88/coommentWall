<?php

namespace app\logic;

use app\models\ModelMain;


class Session
{
    public static function getToken()
    {
        $token = $_SESSION['fb_access_token'];

        if (isset($token)) {
            $result = (new ModelMain('users'))->read(['token'], ["token = '" . $token . "'"]);
            $result = array_shift( $result );
            return $result['token'];
        }
        return null;
    }

    public static function setToken($id, $params)
    {
        $_SESSION['fb_access_token'] = (string)$params;
        (new ModelMain('users'))->update(["token = '" . $params . "'"], ["id = '" . $id . "'"]);
    }

    public static function getUserInfo()
    {
        $token = $_SESSION['fb_access_token'];

        if (isset($token)) {
            $result = (new ModelMain('users'))->read(['*'], ["token = '" . $token . "'"]);
            $result = array_shift( $result );
            return $result;
        }
        return null;
    }

}