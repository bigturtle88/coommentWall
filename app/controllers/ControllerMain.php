<?php
namespace app\controllers;

use app\core\Controller;

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
     $this->view  = new View();

    }

    /**
     * @return string
     */
    public function actionIndex()
    {


        $data['title'] = 'Caesar cipher';

        $this->view->generate($data, 'header.php');
        $this->view->generate($data, 'index.php');
        $this->view->generate($data, 'footer.php');
    }
}