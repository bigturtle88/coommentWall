<?php

/**
 * Class app
 */

class App
{
    private $config;

    public function __construct($config)
    {
        $this->config = $config;
    }

    public function execute()
    {
        \app\Router::execute($this->config);
    }
}
