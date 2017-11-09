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

        $text = urldecode(array_shift($data));

        $id = array_shift($data);
        $id = empty($id) ? null : $id;

        $userInfo = Session::getUserInfo();

        if (!empty($text) and !empty($userInfo)) {
            $model = new ModelMain('comments');
            $idComment = $model->creat(['id', 'text', 'parent', 'user_id', 'create_at'], ['', $text, $id, $userInfo['id'], date('Y-m-d H:i:s')]);
            echo  json_encode(['id' => $idComment]);
        }
        echo false;
    }
    public function actionRead()
    {
        $model = new ModelMain('comments');

        $data = $model->read(['id, parent, text, create_at'], [' parent IS NULL ORDER BY create_at DESC']);
        $dataChildren = $model->read(['id, parent, text, create_at'], [' parent IS NOT NULL ORDER BY create_at ASC']);

        $data =  array_merge($data, $dataChildren);
        $jsonData = [];
        foreach($data as $one) {
            if($one['parent'] == 0) {
                $one['parent'] = '#';
            }

            $jsonData[] = ['id' => $one['id'], 'parent' => $one['parent'], 'text' => $one['text'], 'children' => (bool)$one['children']];

        };
        $data = json_encode($jsonData);

        echo $data;

    }
    public function actionUpdate($data = null)
    {
        if (Session::getToken() === null) {
            header('Location: ' . \App::baseUrl() . '/index');
        }



        $userInfo = Session::getUserInfo();
        $id = array_shift($data);
        $text = array_shift($data);
        if (!empty($id) and !empty($text)) {

            $model = new ModelMain('comments');
            $text = "`text` = '" . $text . "'";
            $id =  "`comments`.`id` = '" . $id . "'";
            $userId =  "`comments`.`user_id` = '" . $userInfo['id'] . "'";
            $model->update([$text], [$id,   $userId]);
        }
    }
    public function actionDelete($data = null)
    {
        if (Session::getToken() === null) {
            header('Location: ' . \App::baseUrl() . '/index');
        }
        $userInfo = Session::getUserInfo();
        $id = array_shift($data);
        if (!empty($id)) {
            $model = new ModelMain('comments');
            $model->delete(['id = ' . $id]);
        }
    }

  
}