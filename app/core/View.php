<?php

namespace app\core;

abstract class View
{
    public function render($content, $template, $data = null)
    {
        require_once('app/views/' . $template);
    }
}
