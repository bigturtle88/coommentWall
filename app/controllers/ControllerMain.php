<?php

namespace app\controllers;

use app\core\Controller;
use app\core\View;
use app\logic\Auth;
use app\logic\Session;
use app\models\ModelMain;

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

//        $model = new ModelMain('comments');
//        $model->create(['id'], [12]);
//        $model->create(['id'], [22]);


        if (Session::getToken() == null) {
            $token = Auth::init();

            Session::setToken($token);

            View::render('header.php', $data);
            View::render('index.php', $data);
            View::render('footer.php', $data);
        }
        echo "Hi";

//
//            $response = $fb->get('/me?fields=id,name', $accessToken);
//            $user = $response->getGraphUser();



        $data['content'] = "";


        View::render('header.php', $data);
     //   View::render('index.php', $data);
        View::render('footer.php', $data);
    }
}