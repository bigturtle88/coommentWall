<?php

namespace app\controllers;

use app\core\Controller;
use app\core\View;

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
        $data['title'] = 'Caesar cipher';

        View::render($data, 'header.php');
        View::render($data, 'index.php');
        View::render($data, 'footer.php');
    }
}