<?php

namespace app\core;

abstract class View
{
    public function render($template, $content, $data = null)
    {
        require_once  __DIR__ . '\\..\\..\\app\\views\\' . $template;
    }
}
