<?php

namespace application\core;

class View
{
    public $path;
    public $route;
    public $layout = 'default';
    function __construct($route)
    {
        $this->route = $route;
        $this->path = $this->route['controller'] . '/' . $this->route['action'];
    }

    public function render($title, $vars = [])
    {
        extract($vars);
        $path = 'application/views/' . $this->path . '.php';
        if (file_exists($path)) {
            ob_start();
            require $path;
            $content = ob_get_clean();
            require 'application/views/layouts/' . $this->layout . '.php';
        } else {
            echo 'Вид не знайдено: ' . $this->path;
        }
    }
    public function redirect($url)
    {
        header('Location: ' . $url);
        exit;
    }
    public static function errorCode($code)
    {
        http_response_code($code);
        $path = 'application/views/error/' . $code . '.php';
        if (file_exists($path)) {
            require $path;
        }
        exit;
    }
}
