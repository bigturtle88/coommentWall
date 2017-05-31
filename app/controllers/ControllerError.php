<?php

namespace app\controllers;

use app\core\Controller;
use app\core\View;

class ControllerError extends Controller
{
    public function actionIndex()
    {
        $data['info'] = 'Error 404';
        View::render('error.php', $data);
    }
}