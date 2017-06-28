<?php

namespace app\logic;

class Session
{
    public function __construct()
    {
    }

    public function getToken()
    {
        if (isset($_SESSION['fb_access_token'])) {
            return $_SESSION['fb_access_token'];
        }
        return null;
    }

    public function setToken($params)
    {
        $_SESSION['fb_access_token'] = (string)$params;
    }

}