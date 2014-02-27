<?php


class Base_Service_Router {

    const DEFAULT_MODUL_NAME = 'Index';
    const DEFAULT_CONTROLLER_NAME = 'Index';
    const DEFAULT_ACTION_NAME = 'index';

    private $_httpReq;
    private $_get;
    private $_url;



    public function __construct()
    {
        $this->_httpReq = $_SERVER['REQUEST_URI'];
        $rec = explode('?', $this->_httpReq);

        $this->_get = $rec[1];
        $this->_url = $rec[0];
    }

    private function _urlToUpperCase($rout)
    {
        $rout = ucfirst($rout);
        return $rout;
    }

    public function start()
    {
        $routes = explode('/', $this->_url);

        $modul = (isset($routes[1]) && $routes[1] != '') ? $this->_urlToUpperCase($routes[1]) : self::DEFAULT_MODUL_NAME;
        $controller = (isset($routes[2]) && $routes[2] != '') ? $this->_urlToUpperCase($routes[2]) : self::DEFAULT_CONTROLLER_NAME;
        $action = (isset($routes[3]) && $routes[3] != '') ? $routes[3] : self::DEFAULT_ACTION_NAME;

        $controllerName = $modul . '_Controller_' . $controller;
        if (!class_exists($controllerName)) {
            die('Shit!');
        }
        $actionName = $action . 'Action';
        if (!method_exists($controllerName, $actionName)){
            die('Shit!');
        }
        $controller = new $controllerName();
        if (!method_exists($controller, $actionName)){
            die('Shit!');
        }

        if (method_exists($controller, 'preAction')){
            $controller->preAction();
        }

        $controller->$actionName();

        if (method_exists($controller, 'postAction')){
            $controller->postAction();
        }

    }

}