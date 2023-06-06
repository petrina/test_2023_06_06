<?php

class App {

    function build():void {
        require_once __DIR__.'/Functions.php';
        $request = new Request();
        $path = $request->get('path');
        if (empty($path)) {
            $controller = 'home';
            $action = 'index';
        } else {
            $pathExplode = explode('/', $path, 2);
            $controller = reset($pathExplode);
            $action = end($pathExplode);
        }
        $controllerName = ucfirst(mb_strtolower($controller)).'Controller';
        $controllerClass = new $controllerName();
        $controllerClass->$action();
    }
}
