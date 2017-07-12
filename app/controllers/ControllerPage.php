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
class ControllerPage extends Controller
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

        if (Session::getToken() === null) {}


        View::render('header.php', $data);
        View::render('page.php', $data);
        View::render('footer.php', $data);
    }

  
}