<?php

class Router {

    public function route() {
        $controllerName = Application::getInstance()->getConfig()->router->default;
        if(isset(Application::getInstance()->getRequest()->controller)){
            $controllerName = Application::getInstance()->getRequest()->controller;
        }
        $className = 'Controller' . ucfirst($controllerName);
        $controller = new $className();
        Application::getInstance()->setController(
            $controller
        );
        $controller->execute();
    }

}