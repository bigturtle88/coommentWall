<?php

namespace app\controllers;

use app\core\Controller;
use app\core\View;
use app\core\Model;
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
    {   $model = new Model('comments');
        $a = $model->delete(['id<1152']);
        var_dump( $a);die();
        $data['title'] = 'Caesar cipher';

        View::render('header.php', $data);
        View::render('index.php', $data);
        View::render('footer.php', $data);
    }
}