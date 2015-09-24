<?php

class Router {

    public function route() {
        $controllerName = null;
        if(isset(Application::getInstance()->getRequest()->controller)){
            $controllerName = Application::getInstance()->getRequest()->controller;
        }
        $className = $this->getControllerName($controllerName);
        if (!is_null($controllerName) && class_exists($className)){
            $controller = new $className();
        } else {
            $controller = $this->getDefaultController();
        }
        Application::getInstance()->setController(
            $controller
        );
        $controller->execute();
    }

    public function getControllerName ($controllerName) {
        return 'Controller' . ucfirst($controllerName);
    }

    public function getDefaultController() {
        $className = $this->getControllerName(Application::getInstance()->getConfig()->router->default);
        return new $className();
    }
}