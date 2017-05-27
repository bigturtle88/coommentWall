<?php

namespace app\core;
/**
 * Class Router
 * @package app\core
 */
class Router
{
    /**
     * @var array
     */
    static $router = array();

    /**
     *
     */
    static function execute()
    {
        $url = self::allUrl();
        $urlSep = self::urlSeparator($url);
        $path = self::pathSeparator($urlSep['path']);

        empty($args[0]) ? $controllerName = 'main' : $controllerName = $args[0];
        empty($args[1]) ? $actionName = 'index' : $actionName = $args[1];
        empty($args[2]) ? $parameter = null : $parameter = $args[2];
        $modelName = 'Model' . ucfirst(strtolower($controllerName));
        $controllerName = 'Controller' . ucfirst(strtolower($controllerName));
        $actionName = 'action' . ucfirst(strtolower($actionName));
        $fileWithModel = $modelName . '.php';
        $fileWithModelPath = "app/models/" . $fileWithModel;
        if (file_exists($fileWithModelPath)) {
            require_once($fileWithModelPath);
        }
        $fileWithController = strtolower($controllerName) . '.php';
        $fileWithControllerPath
            = "app/controllers/" . $fileWithController;
        if (file_exists($fileWithControllerPath)) {
            require_once($fileWithControllerPath);
        } else {
            $controllerName = 'ControllerE404';
            require_once('app/controllers/controllerE404.php');
        }
        $controller = new $controllerName;
        $action = $actionName;
        if (method_exists($controller, $action) != false) {
            call_user_func(array($controller, $action), $parameter);
        } else {
            require_once('app/controllers/controllerE404.php');
            $controller = new ControllerE404;
            $action = 'actionIndex';
            call_user_func(array($controller, $action));
        }
    }

    /**
     * @return array|string
     */
    private function urlSeparator($url)

    {
        return parse_url($url);
    }

    /**
     * @param $path
     * @return array
     */
    private function pathSeparator($path)
    {
        $result = [];
        $path = ltrim($path, '/');
        $pathSep = explode('/', $path);
        $result['controller'] = array_shift($pathSep);
        $result['action'] = array_shift($pathSep);
        $result['params'] = $pathSep;

        return $result;
    }


    /**
     * @return string
     */
    public function allUrl()
    {
        $allUrl = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        return $allUrl;
    }
}

