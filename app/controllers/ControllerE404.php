<?php
namespace app\controllers;

use app\core\Controller;
use app\core\View;

class ControllerE404 extends Controller
{
      public function actionIndex()
    {
        View::render(     $data['title'] = 'Caesar cipher','e404.php');
    }
}