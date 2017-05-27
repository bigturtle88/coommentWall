<?php

namespace app;



/**
 * Class Router
 * @package app\core
 */
class Router extends core\Router
{
    /**
     * @var array
     */
    static $router = array();

    /**
     * @param array $config
     */
    static function execute($config)
    {

        $url = self::allUrl();
        $urlSep = self::urlSeparator($url);
        $path = self::pathSeparator($urlSep['path']);

        $controllerName = empty($path['controller']) ? $config['baseController'] : $path['controller'];
        $actionName = empty($path['action']) ? $config['baseAction'] : $path['action'];
        $params = empty($path['params']) ? null : $path['params'];

        $controllerName = 'Controller' . ucfirst(strtolower($controllerName));
        $actionName = 'action' . ucfirst(strtolower($actionName));

        $controllerRun = "\\app\\controllers\\{$controllerName}";

        if (method_exists($controllerRun, $actionName)) {

            $controllerRun::$actionName($params);
        } else {
            $controllerName = 'ControllerE404';
            $controllerRun = "\\app\\controllers\\$controllerName";
            $actionName = 'actionIndex';
            $controllerRun::$actionName();
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

    /**
     * @return mixed
     */
    public function  baseUrl()
    {
        $baseUrl = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'];
        return $baseUrl;
    }
}

