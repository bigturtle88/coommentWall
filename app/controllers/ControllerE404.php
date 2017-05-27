<?php
namespace app\controllers;

use app\core\Controller;

class ControllerE404 extends Controller
{
    public $model;
    public $view;
    public $data = array();

    function __construct()
    {
        $this->view  = new View();
        $this->model = new Model();
    }

    public function actionIndex()
    {
        echo '404';
    }
}