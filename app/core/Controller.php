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

    /**
     * Controller constructor.
     */
    public function __construct()
    {

    }

    /**
     *
     */
    public function actionIndex()
    {
    }
}