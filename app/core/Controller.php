<?php

namespace app\core;

/**
 * Class Controller
 * @package app\core
 */
abstract class Controller
{
    public $model;
    public $view;

   function __construct()
    {

    }

    function actionIndex()
    {
    }
}