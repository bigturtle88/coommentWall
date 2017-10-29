<?php

namespace app\controllers;

use app\core\Controller;
use app\core\View;
use app\logic\Fb;
use app\logic\Session;
use app\logic\Reg;
use app\components\AuthFacebook;
use app\models\ModelMain;

/**
 * Class ControllerMain
 * @package app\controllers
 */
class ControllerComment extends Controller
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
    public function actionCreat($data = null)
    {
        if (Session::getToken() === null) {

            header('Location: ' . \App::baseUrl() . '/index');
        }
        $userInfo = Session::getUserInfo();
        if (!empty($data) and !empty($userInfo)) {
            $data = array_shift($data);
            $model = new ModelMain('comments');
            $model->create(['id', 'text', 'parent', 'user_id', 'create_at'], ['', $data, '', $userInfo['id'], date('Y-m-d H:i:s')]);

        }


    }
    public function actionRead()
    {
        $model = new ModelMain('comments');
        $data = $model->read(['id, parent, text, create_at'],[' 1 ORDER BY create_at DESC']);
        $jsonData = [];
        foreach($data as $one) {
            if($one['parent'] == 0) {
                $one['parent'] = '#';
            }
            $one['text'] = '('. $one['create_at'] .') ' . $one['text'];
            $jsonData[] = ['id' => $one['id'], 'parent' => $one['parent'], 'text' => $one['text'] ];

        };
        $data = json_encode($jsonData);

        echo $data;



    }

  
}