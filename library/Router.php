<?php

class Router {

    public function route() {
        $controllerName = Application::getInstance()->getConfig()->router->default;
        $className = 'Controller' . ucfirst($controllerName);
        $controller = new $className();
        Application::getInstance()->setController(
            $controller
        );
        $controller->execute();
    }

}