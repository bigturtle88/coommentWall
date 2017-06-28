<?php

namespace app\logic;

class Session
{
    private function __construct()
    {
    }

    public static function getToken()
    {
        if (isset($_SESSION['fb_access_token'])) {
            return $_SESSION['fb_access_token'];
        }
        return null;
    }

    public static function setToken($params)
    {
        $_SESSION['fb_access_token'] = (string)$params;
    }

}