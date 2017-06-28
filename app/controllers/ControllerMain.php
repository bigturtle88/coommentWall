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
//        $model->create(['id'], [33]);
        $token = Auth::init();
        var_dump($token);
        $session = new Session();
        if ($session->getToken() == null) {

            $session->setToken($token);

        }
        echo "Hi";
//        echo '<h3>Access Token</h3>';
//        $accessToken =    "EAAWIkG5PsNABAIW8wJtzS4Y7qLCZA222k7FLWDyx4EZC7XZCjDiIcZCDF5XP04dlM7ZA4bjZAbvqgAcwF3D7aqHHjESfama5nSE0DkQED2C34pDpGJfZCZBxKViN8xR6DjJMndhuqhT56CzlVJZAiIiz9ljPseXIXrrIjZCje9xsXcTZAbzPdgKW86GF2WPQVlDmZBwZD";
//        if ( isset($accessToken)) { $_SESSION['fb_access_token'] = (string) $accessToken;
//            //var_dump($accessToken->getValue());
//
//
//
//            $response = $fb->get('/me?fields=id,name', $accessToken);
//            $user = $response->getGraphUser();
//            var_dump($user);die();
//        }

        $session = (new Session)->getToken();
        var_dump($a);
        View::render('header.php', $data);
        View::render('index.php', $data);
        View::render('footer.php', $data);
    }
}