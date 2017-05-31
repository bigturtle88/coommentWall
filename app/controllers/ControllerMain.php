<?php

namespace app\controllers;

use app\core\Controller;
use app\core\View;
use app\models\ModelMain;
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
    {   $model = new ModelMain('comments');
        $model->create(['id'],[12]);
        $model->create(['id'],[22]);
        $model->create(['id'],[33]);

       die();
        $data['title'] = 'Caesar cipher';

        View::render('header.php', $data);
        View::render('index.php', $data);
        View::render('footer.php', $data);
    }
}