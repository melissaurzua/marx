<?php

class Router {

	/**
	 * Routes to cotroller
	 */
	public function route() {
		$controller = $this->getController();
		Application::getInstance()->setController($controller);
		$controller->execute();
	}

	/**
	 * Creates controller by request/default-setting
	 *
	 * @return Controller
	 */
	public function getController() {
		$controllerName = null;
		if(isset(Application::getInstance()->getRequest()->controller)){
			$controllerName = Application::getInstance()->getRequest()->controller;
		}
		$className = $this->getControllerName($controllerName);
		if (!is_null($controllerName) && class_exists($className)){
			return new $className();
		} else {
			return $this->getDefaultController();
		}
	}

	/**
	 * Gets controller class-name
	 *
	 * @param string $controllerName
	 * @return string
	 */
	public function getControllerName ($controllerName) {
			return 'Controller' . ucfirst($controllerName);
	}

	/**
	 * @return Controller
	 */
	public function getDefaultController() {
		$className = $this->getControllerName(
			Application::getInstance()->getConfig()->router->default
		);
		return new $className();
	}
}