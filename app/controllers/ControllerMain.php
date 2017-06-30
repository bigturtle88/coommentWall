<?php

namespace app\controllers;

use app\core\Controller;
use app\core\View;
use app\logic\Fb;
use app\logic\Session;
use app\logic\Reg;
use app\components\AuthFacebook;


/**
 * Class ControllerMain
 * @package app\controllers
 */
class ControllerMain extends Controller
{
    /**
     * @var
     */
    public $model;
    public $view;
    public $result;
    public $data = array();

    /**
     * ControllerMain constructor.
     */
    function __construct()
    {


    }

    /**
     * @return string
     */
    public function actionIndex()
    {

        if (Session::getToken() === null) {
            $fb = new Fb;
            $token = $fb->token();
            if ($token != null) {
                $userParams = $fb->userParams();
                if (Reg::verification($userParams) == false) {
                    Reg::add($userParams);
                };

                Session::setToken($userParams['id'], $token);
                header('Location: ' . \App::baseUrl() . '/main/comment');
            }

        } else {
            header('Location: ' . \App::baseUrl() . '/main/comment');
        }

        View::render('header.php', $data);
        View::render('index.php', $data);
        View::render('footer.php', $data);
    }

    public function actionComment()
    {

        echo "hello";

    }


}